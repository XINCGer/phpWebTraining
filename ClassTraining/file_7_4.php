<?php
// 人基类
class Person {
	protected $name, $age, $sex, $height;
	function __construct($name = "", $age = "", $sex = "", $height = "") {
		$this->name = $name;
		$this->age = $age;
		$this->sex = $sex;
		$this->height = $height;
	}
	function talk() {
		echo $this->name . "正在说话" . "<br>";
	}
	function walk() {
		echo $this->name . "正在走路" . "<br>";
	}
}

// 司机子类
class Driver extends Person {
	private $driveAge;
	function __construct($name = "", $age = "", $sex = "", $height = "", $driveAge = "") {
		parent::__construct ( $name, $age, $sex, $height );
		$this->driveAge = $driveAge;
	}
	function drive() {
		echo $this->name . "正在开车" . "<br>";
	}
}

// 医生子类
class Doctor extends Person {
	private $hospital, $department;
	function __construct($name = "", $age = "", $sex = "", $height = "", $hospital = "", $department = "") {
		parent::__construct ( $name, $age, $sex, $height );
		$this->hospital = $hospital;
		$this->department = $department;
	}
	function treat() {
		echo $this->name . "正在为病人治疗" . "<br>";
	}
}
// 人 类实例化
$person1 = new Person ( "张三", 20, "男", 180 );
$person1->talk ();
$person1->walk ();
// 司机类实例化
$driver1 = new Driver ( "李四", 30, "男", 175, 8 );
$driver1->drive ();
// 医生类实例化
$doctor1 = new Doctor ( "王丽", 25, "女", 167, "中国医科大学", "儿科" );
$doctor1->treat ();