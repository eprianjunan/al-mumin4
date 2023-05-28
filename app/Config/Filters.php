<?php

namespace Config;

use App\Filters\FilterAdmin;
use App\Filters\FilterSiswa;
use App\Filters\FilterGuru;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'filteradmin' => FilterAdmin::class,
		'filtersiswa' => FilterSiswa::class,
		'filterguru' => FilterGuru::class
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'filteradmin' => ['except' => [
			'auth', 'auth/*',
			'/', 
			'pages', 'pages/*'
		]],
		'filtersiswa' => ['except' => [
			'auth', 'auth/*',
			'/', 
			'pages', 'pages/*'
		]],
		'filterguru' => ['except' => [
			'auth', 'auth/*',
			'/', 
			'pages', 'pages/*'
		]]
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'filteradmin' => ['except' => [
			'/', 
			'pages', 'pages/*',
			'admin', 'admin/*',
			'tentangkami', 'tentangkami/*',
			'sambutan', 'sambutan/*',
			'berita', 'berita/*',
			'visimisi', 'visimisi/*',
			'kepalasekolah', 'kepalasekolah/*',
			'guruadmin', 'guruadmin/*',
			'tenagaadministrasi', 'tenagaadministrasi/*',
			'fasilitas', 'fasilitas/*',
			'ekstrakulikuler', 'ekstrakulikuler/*',
			'kontak', 'kontak/*',
			'MapelKelas', 'MapelKelas/*',
			'guru', 'guru/guru',
			'guru', 'guru/save',
			'guru', 'guru/create',
			'guru', 'guru/ubah/*',
			'guru', 'guru/update/*',
			'guru', 'guru/ubahDefault/*',
			'guru', 'guru/reset/*',
			'guru', 'guru/delete/*',
			'siswa', 'siswa/siswa',
			'siswa', 'siswa/save',
			'siswa', 'siswa/create',
			'siswa', 'siswa/ubah/*',
			'siswa', 'siswa/update/*',
			'siswa', 'siswa/ubahDefault/*',
			'siswa', 'siswa/reset/*',
			'siswa', 'siswa/delete/*',   
			]],
			'filtersiswa' => ['except' => [
				'/', 
				'pages', 'pages/*',
				'siswa', 'siswa/*'
			]],
			'filterguru' => ['except' => [
				'/', 
				'pages', 'pages/*',
				'guru', 'guru/*'
			]],
			'toolbar',
			// 'honeypot',
		]
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}