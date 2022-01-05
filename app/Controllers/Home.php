<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // 1. menggunakan query builder
        $builder = $this->db->table('data');
        $query = $builder->get()->getResult();

        $data = [
            'title' => 'Semua Data',
            'users' => $query
        ];

        return view('read', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data'
        ];

        return view('create', $data);
    }

    public function action_create()
    {
        // 1. Jika name input sama dengan name field table di database
        $data = $this->request->getPost();

        // 2. Jika name input berbeda dengan name field table di database
        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'email' => $this->request->getVar('email'),
        //     'no_hp' => $this->request->getVar('no_hp'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ];

        $this->db->table('data')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to('/home')->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('data')->getWhere(['id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Ubah Data',
                    'query' => $query->getRow()
                ];
                return view('update', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function action_update($id)
    {
        // 1. Jika name input sama dengan name field table di database
        // $data = $this->request->getPost();
        // unset($data['_method']);

        // 2. Jika name input berbeda dengan name field table di database
        $data = [
            'nama'   => $this->request->getVar('nama'),
            'email'  => $this->request->getVar('email'),
            'no_hp'  => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $this->db->table('data')->where(['id' => $id])->update($data);
        return redirect()->to('/home')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $this->db->table('data')->where(['id' => $id])->delete();
        return redirect()->to('/home')->with('success', 'Data Berhasil Dihapus');
    }
}
