<?php
    class Model_Settings extends Model
    {
        private $path_icon = '/images/avatars/';

        public function settings($id, $icon = null)
        {
            $query = 'SELECT * FROM user WHERE id=?';
            $data = DB::run($query, [$id])->fetch();
            $login = $data['login'];
            $prev = $data['avatar'];

            if($icon == null)
            {
                if($prev == "def")
                    $result['ava'] = "/images/avatars/def.jpg";
                else {
                    $result['ava'] = $this->path_icon . $login . "." . $prev;
                }
            }

            else
            {
                $result = $this->upload_icon($icon, $login);
            }

            return $result;
        }

        private function set_image_default($login)
        {
            $query = 'SELECT avatar FROM user WHERE login=?';
            $prev = DB::run($query, [$login])->fetch();
            $str = $_SERVER['DOCUMENT_ROOT'].$this->path_icon.$login.".".$prev['avatar'];
            if(file_exists($str))
                unlink($str);
            $query = 'UPDATE user SET avatar=? WHERE login=?';
            $res = DB::run($query, ["def", $login]);
            return $res;
        }

        public function upload_icon(array $icon, $login)
        {
            $this->set_image_default($login);
            $size = 4000000;
            $types = array('image/png', 'image/jpeg', 'image/jpg', 'image/bmp');
            $path_icon = '/images/avatars/';

            if (empty($icon['type']) || !in_array($icon['type'], $types))
            {
                $result['error'] = 'Используйте разрешенные форматы файла: *.png, *.jpeg, *.jpg, *.bmp !';
            }
            else if ($icon['size'] > $size)
            {
                $result['error'] = 'Слишком большой файл!';
            }
            else {
                $format = (!isset($icon['type'])) ? "def" : str_ireplace('image/', '', $icon['type']);
                $to = $_SERVER['DOCUMENT_ROOT'] . $path_icon . $login . "." . $format;
                if (!isset($result['error'])) {
                    if (!copy($icon['tmp_name'], $to)) {
                        $result['error'] = 'Загрузка не удалась';
                    } else {
                        $query = 'UPDATE user SET avatar=? WHERE login=?';
                        $data = DB::run($query, array($format, $login));
                        if ($data) {
                            $result['success'] = 'Иконка успешно загружена';
                        }
                    }
                }
            }
            return $result;
        }
    }