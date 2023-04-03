<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data[] = [
            'username' => 'admin',
            'password'  => md5('1112'),
            'level' => '0',
        ];
        $data[] = [
            'username' => 'luan',
            'password'  => md5('luan'),
            'level' => '0',
        ];
        $data[] = [
            'username' => 'nhan',
            'password'  => md5('nhan'),
            'level' => '0',
        ];
        $data[] = [
            'username' => 'phuong',
            'password'  => md5('phuong'),
            'level' => '0',
        ];
        $data[] = [
            'username' => 'tinh',
            'password'  => md5('tinh'),
            'level' => '0',
        ];

        $this->db->transBegin();
        for ($i = 0; $i < 4; $i++) {
            $is_save = $this->db->table('admin')->insert($data[$i]);
            if (!$is_save) {
                $this->db->transRollback();
                throw new \Exception($this->db->error()['message']);
            }
        }
        $this->db->transCommit();
    }
}
