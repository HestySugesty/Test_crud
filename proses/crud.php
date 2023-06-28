<?php
    require 'panggil.php';

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $id = strip_tags($_POST['id']);
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $phone = strip_tags($_POST['phone']);
        $address = strip_tags($_POST['address']);
        
        $tabel = 'user';
        # proses insert
        $data[] = array(
            'id'		=>$id,
			'name'	    =>$name,
			'email'     =>$email,
            'phone'		=>$phone,
            'address'	=>$address
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
    }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
		   $id = strip_tags($_POST['id']);
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $phone = strip_tags($_POST['phone']);
        $address = strip_tags($_POST['address']);
        // jika password tidak diisi
        if($pass == '')
        {
            $data = array(
            'id'		=>$id,
			'name'	    =>$name,
			'email'     =>$email,
            'phone'		=>$phone,
            'address'	=>$address
            );
        }else{

            $data = array(
            'id'		=>$id,
			'name'	    =>$name,
			'email'     =>$email,
            'phone'		=>$phone,
            'address'	=>$address
            );
        }
        $tabel = 'user';
        $where = 'id';
        $id= strip_tags($_POST['id']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
    }
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'user';
        $where = 'id';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        //$result = $proses->proses_login($user,$pass);
		echo $user;
        if($result == 'gagal')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan 
            session_start();
            $_SESSION['ADMIN'] = $result;
			header('Location: ../index.php');
            // status yang diberikan 
            echo "<script>window.location='../index.php';</script>";
        }
    }
