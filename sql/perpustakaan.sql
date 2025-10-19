CREATE DATABASE perpustakaan;

USE perpustakaan;

-- Tabel pengguna
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'anggota') DEFAULT 'anggota',
    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel buku
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    penulis VARCHAR(100),
    penerbit VARCHAR(100),
    tahun_terbit YEAR,
    kategori VARCHAR(100),
    stok INT DEFAULT 1,
    cover VARCHAR(255)
);

INSERT INTO
    buku (
        judul,
        penulis,
        penerbit,
        tahun_terbit,
        kategori,
        cover
    )
VALUES
    (
        'Laskar Pelangi',
        'Andrea Hirata',
        'Bentang Pustaka',
        2005,
        'Novel',
        'laskar_pelangi.jpg'
    ),
    (
        'Bumi Manusia',
        'Pramoedya Ananta Toer',
        'Hasta Mitra',
        1980,
        'Sastra',
        'bumi_manusia.jpg'
    ),
    (
        'Negeri 5 Menara',
        'Ahmad Fuadi',
        'Gramedia',
        2009,
        'Novel',
        'negri_5_menara.jpg'
    );

-- Tabel peminjaman
CREATE TABLE peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_buku INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE,
    tanggal_pengembalian DATE NULL,
    status ENUM('dipinjam', 'dikembalikan') DEFAULT 'dipinjam',
    denda INT DEFAULT 0,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_buku) REFERENCES buku(id)
);