<?php
// �˻���
class Person {
	protected $name, $age, $sex, $height;
	function __construct($name = "", $age = "", $sex = "", $height = "") {
		$this->name = $name;
		$this->age = $age;
		$this->sex = $sex;
		$this->height = $height;
	}
	function talk() {
		echo $this->name . "����˵��" . "<br>";
	}
	function walk() {
		echo $this->name . "������·" . "<br>";
	}
}

// ˾������
class Driver extends Person {
	private $driveAge;
	function __construct($name = "", $age = "", $sex = "", $height = "", $driveAge = "") {
		parent::__construct ( $name, $age, $sex, $height );
		$this->driveAge = $driveAge;
	}
	function drive() {
		echo $this->name . "���ڿ���" . "<br>";
	}
}

// ҽ������
class Doctor extends Person {
	private $hospital, $department;
	function __construct($name = "", $age = "", $sex = "", $height = "", $hospital = "", $department = "") {
		parent::__construct ( $name, $age, $sex, $height );
		$this->hospital = $hospital;
		$this->department = $department;
	}
	function treat() {
		echo $this->name . "����Ϊ��������" . "<br>";
	}
}
// �� ��ʵ����
$person1 = new Person ( "����", 20, "��", 180 );
$person1->talk ();
$person1->walk ();
// ˾����ʵ����
$driver1 = new Driver ( "����", 30, "��", 175, 8 );
$driver1->drive ();
// ҽ����ʵ����
$doctor1 = new Doctor ( "����", 25, "Ů", 167, "�й�ҽ�ƴ�ѧ", "����" );
$doctor1->treat ();