<?
class Demo{
  public function test(MainClass $c){
      echo $c->test();
  }
}

class MainClass{
    public test(){
      echo "Test";
    }
}
$first = new Demo();
$second = new MainClass();
$first->test($second);

 