CREATE TABLE tb_user (
	user_id int(11) NOT NULL AUTO_INCREMENT,
	user_name varchar(25) NOT NULL,
	user_password varchar(255) DEFAULT NULL,
	user_email varchar(50) DEFAULT NULL,
	user_nama_lengkap varchar(100) DEFAULT NULL,
	user_level tinyint(1) NOT NULL DEFAULT '2',
	user_aktif ENUM('Y','N') NOT NULL DEFAULT 'Y',	
	PRIMARY KEY (user_id),
	UNIQUE KEY (user_name)
);

CREATE TABLE tb_siswa (
	siswa_id int(11) NOT NULL AUTO_INCREMENT,
	siswa_id_user int(11) NOT NULL,
	siswa_no_psb varchar(20) DEFAULT NULL,
	siswa_id_jur INT(11),
	siswa_nama varchar(100) DEFAULT NULL,
	siswa_nis VARCHAR(10),
	siswa_jk CHAR(1),
	siswa_tmplahir VARCHAR(100),
	siswa_tgllahir DATE,
	siswa_agama VARCHAR(25),
	siswa_alamat VARCHAR(100),
	siswa_ayah_nama VARCHAR(100),
	siswa_ayah_alamat VARCHAR(100),
	siswa_ayah_pek VARCHAR(100),
	siswa_ayah_hp VARCHAR(20),
	siswa_sekolah_asal VARCHAR(100),
	siswa_sekolah_sta VARCHAR(20),
	siswa_sekolah_alm VARCHAR(100),
	siswa_no_sttb VARCHAR(50),
	siswa_no_skhun VARCHAR(50),
	siswa_thn_lls VARCHAR(4),
	siswa_nilai INT(11),
	siswa_validasi enum('Y','N') NOT NULL DEFAULT 'N',
	siswa_terima enum('Y','N') DEFAULT NULL,
	PRIMARY KEY (siswa_id),
	UNIQUE KEY (siswa_id_user)
);

CREATE TABLE tb_berkas (
	berkas_id int(11) NOT NULL AUTO_INCREMENT,
	berkas_id_user int(11) NOT NULL,
	berkas_upload_name varchar(255) NOT NULL,
	PRIMARY KEY (berkas_id),
	UNIQUE KEY (berkas_upload_name)	
);

CREATE TABLE tb_pesan (
  pesan_id INT(11) NOT NULL AUTO_INCREMENT,
  pesan_id_user INT(11) NOT NULL,
  pesan_tgl TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  pesan_judul VARCHAR(100) NOT NULL,
  pesan_text TEXT NOT NULL,
  pesan_baca ENUM('Y', 'T') DEFAULT 'T',
  pesan_parent INT(11) DEFAULT '0',
  PRIMARY KEY (pesan_id)
);

CREATE TABLE tb_berita (
	berita_id INT(11) NOT NULL AUTO_INCREMENT,
	berita_tgl TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	berita_judul VARCHAR(255) NOT NULL,
	berita_text TEXT DEFAULT NULL,	
	berita_aktif ENUM('Y','N') DEFAULT 'Y',	
	PRIMARY KEY (berita_id),
	UNIQUE KEY (berita_judul)
);

CREATE TABLE tb_jurusan (
	jur_id INT(11) NOT NULL AUTO_INCREMENT,
	jur_kode VARCHAR(25) NOT NULL,
	jur_nama VARCHAR(255) NOT NULL,
	jur_keterangan TEXT DEFAULT NULL,
	jur_kuota INT(11) DEFAULT '0',
	PRIMARY KEY (jur_id),
	UNIQUE KEY (jur_kode)
);

CREATE TABLE tb_setting (
	set_id INT(11) NOT NULL AUTO_INCREMENT,
	set_name TEXT NOT NULL,
	set_value TEXT NOT NULL,
	set_file TEXT DEFAULT NULL,	
	PRIMARY KEY (set_id)
);

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_nama_lengkap`, `user_level`, `user_aktif`) VALUES
(NULL, 'admin', 'admin', 'gondang.teguh@yahoo.co.id', 'Gondang Teguh', 1, 'Y');

INSERT INTO `tb_setting` (`set_id`, `set_name`, `set_value`, `set_file`) VALUES
(NULL, 'sambutan', '<p>Sambutan Kepala Sekolah</p>', NULL),
(NULL, 'alur', '<p>Alur Pendaftaran</p>', NULL),
(NULL, 'kalender', '<p>Kalender Akademik</p>', NULL);