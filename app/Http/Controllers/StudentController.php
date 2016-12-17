<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    //DB facade实现CURD
    function query1() {
        //查询表
        /*$students = DB::select('select * from student');
        var_dump($students);*/
        //插入表
        /*$bool = DB::insert('insert into student(name,age) values(?,?)',
            ['Alice',15]);
        var_dump($bool);*/
        //修改字段
        /*$num = DB::update('update student set age = ? where name = ?',[20,'JaCa']);
        var_dump($num);*/
        //删除
        /*$num = DB::delete('delete from student where id = ?',[1001]);
        var_dump($num);*/
    }
    //使用查询构造器添加数据
    function query2() {
//        $bool = DB::table('student')->insert(
//            ['name' => 'JaCa','age' => 18]
//        );
//        var_dump($bool);

//        $id = DB::table('student')->insertGetId(
//            ['name' => 'JaCa','age' => 18]);
//        var_dump($id);

        $num = DB::table('student')->insert([
            ['name' => 'JaCa','age' => 18],
            ['name' => 'JaCa1','age' => 19]
        ]);
        var_dump($num);
    }
    //使用查询构造器更新数据
    function query3() {
//        $num = DB::table('student')
//            ->where(['name' => 'JaCa'])
//            ->update(['age' => 20]);
//        var_dump($num);

//        $num = DB::table('student')->increment('age');
//        $num = DB::table('student')->increment('age',3);
//        var_dump($num);

//          $num = DB::table('sutdent')->decrement('age');
//          $num = DB::table('sutdent')->decrement('age',3);
//          var_dump($num);
    }

    //使用查询构造器删除数据
    function query4() {

//        $num = DB::table('student')
//            ->where('id',1002)
//            ->delete();
//        var_dump($num);

//        $num = DB::table('student')
//            ->where('id','>=',1002)
//            ->delete();
//        var_dump($num);

        //删除整张表，谨慎使用
//        DB::table('student')->truncate();
    }

    function query5() {
//        $students = DB::table('student')->get();
//        $students = DB::table('student')
//            ->orderBy('id','desc')
//            ->first();

//        $students = DB::table('student')
//            ->where('id','>=', 1002)
//            ->get();

//        $students = DB::table('student')
//            ->whereRaw('id >= ? and age >= ?', [1001,18])
//            ->get();
        //pluck 返回指定字段
//        $students = DB::table('student')
//            ->pluck('name');
        //list 指定下标
//        $students = DB::table('student')
//            ->lists('name','id');
        //指定字段查询
//        $students = DB::table('student')
//            ->select('name','age')
//            ->get();
        //chunk
//        echo '<pre>';
        $students = DB::table('student')
            ->chunk(1, function ($student) {
                var_dump($student);
            });
//        dd($students);
    }

    //聚合函数
    public function  query6() {

//        $num = DB::table('student')->count();    //总条数
//        $max = DB::table('student')->max('age'); //最大值
//        $min = DB::table('student')->min('age'); //最小值
//        $avg = DB::table('student')->avg('age'); //平均值
        $sum = DB::table('student')->sum('age'); //总的值
        var_dump($sum);
}

    //Eloquent ORM
    public function orm1() {
//        all()
//        $students = Student::all();
//      find()
//        $students = Student::find(1003);
//        findOrFail
//        $students = Student::findOrFail(1009);

//        $students = Student::get();
//        $students = Student::where('id','>=', 1001)
//                        ->orderBy('age','desc')
//                        ->first();
//        Student::chunk(2, function($student) {
//            var_dump($student);
//        });
//        $num = Student::count();
//        dd($num);
    }

    public function orm2() {

        //使用模型新增数据
//        $student = new Student();
//        $student->name = 'Sean1';
//        $student->age = 18;
//        $bool = $student->save();

//        $student = Student::find(1009);
//        echo date('Y-m-d H:i:s',$student->created_at);

        //使用模型的Create方法新增数据

//        $student = Student::create(
//            ['name' => 'imooc','age' => 18]
//        );
//        dd($student);

        //firstOrCreate() 指定查找若没有则新增
//        $student = Student::firstOrCreate(
//            ['name' => 'imooc']
//        );
        //firstOrNew
//        $student = Student::firstOrNew(
//            ['name' => 'imooc']
//        );
//        $bool = $student->save();
//        dd($bool);
    }

    public function orm3() {
        //通过模型更新数据
//        $student = Student::find(1009);
//        $student->name = 'kitty';
//        $student->save();

//        Student::where('id', '=', 1010)
//            ->update(
//            ['name' => 'Update1']
//        );
    }

    public function orm4() {
        //通过模型删除数据
//        $student = Student::find(1010);
//        $bool = $student->delete();
//        dd($bool);

        $num = Student::destroy(1009);
        dd($num);
    }

    public function section1() {

        $students = Student::all();

        $name = 'JaCa';
        $arr = ['JaCa','imooc'];
        return view('student.section1',
            ['name' => $name,'arr' => $arr,'students' => $students]);
    }

    public function urlTest() {
        return 'UrlTest';
    }

    public function request1(Request $request) {
        //1、取值
//        echo $request->input('name');
//        echo $request->input('name','未知');

//        if ($request>has('name')) ｛
//            echo $request->input('name');
//        else {
//            echo '无该参数';
//        }

//        $res = $request->all();
//        dd($res);

        //2.判断请求类型
//        echo $request->method();
//        if ($request->isMethod('GET')) {
//            echo 'Yes';
//        }
//        $res = $request->ajax();
//        var_dump($res);

//        $res = $request->is('student/*');
            echo $request->url();
    }

    public function session1(Request $request) {
        //1、HTTP request session
//        $request->session()->put('key1','value1');
//        echo $request->session()->get('key1');

        //2.session()辅助函数
//        session()->put('key2','value2');
//        echo session()->get('key2');

        //3.Session
//        Session::put('key3','value3');
//        echo Session::get('key3');
//        echo Session::get('key3','default');

        //把数组放到Session的数组中
//        Session::push('student','JaCa');
//        Session::push('student','JiuJiu');
        //把数组取完就删除
//          $res = Session::pull('student');
        //取出所有值
//        Session::all();
        //判断是否存在该值
//        Session::has('key1');
        //删除session指定key
//        Session::forget('key1');
        //清除session所有键值
//        Session::flush();
        //第一次访问存在，然后清除
//        Session::flash('key4','value4');
    }

    public function session2(Request $request) {

        return Session::get('message','暂无信息');
//        return 'session2';
    }

    public function response() {
        //3.响应json
//        $data = [
//            'errCode' => 0,
//            'errMsg' => 'success',
//            'data' => 'JaCa'
//        ];
//
//        return response()->json($data);

        //4.重定向
//        return redirect('session2');
//        return redirect('session2')->with('message','我是重定向');

        //action
//        return redirect()->action('StudentController@session2')
//            ->with('message','我是重定向');
        //route(
//        return redirect()->route('session2')
//            ->with('message','我是重定向');
        //返回上级目录
//        return redirect()->back();
        return 'response';
    }
    //活动宣传页
    public function activity0() {
        return '活动快要开始啦，敬请期待!';
    }
    //活动进行中
    public function activity1() {
        return '活动进行中';
    }

    //活动结束
    public function activity2() {
        return '活动进行中';
    }


    //学生列表页
    public function listpage() {

        $students = Student::paginate(2);

        return view('student.index',['students' => $students]);
    }

    //添加页面
    public function create(Request $request) {

        $student = new Student();

        if ($request->isMethod('POST')) {

            //1、控制器验证
/*            $this->validate($request,[
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ],[
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ],[
                'Student.name' => '名字',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);*/

            //2、Validatot类验证
            $validator = \Validator::make($request->input(),[
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ],[
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ],[
                'Student.name' => '名字',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->input('Student');
            if (Student::create($data)) {
                return redirect('listpage')->with('success','添加成功');
            }else{
                return redirect()->back()->with('error','添加失败');
            }
        }

        return view('student.create',[
            'student' => $student,
        ]);
    }

    //保存页面
    public function save(Request $request) {
        $data = $request->input('Student');

        $student = new Student();

        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];

        if ($student->save()) {
            return redirect('listpage');
        }else{
            return redirect()->back();
        }
    }


}
