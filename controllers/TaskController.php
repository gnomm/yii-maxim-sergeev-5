<?php
/**
 * Created by PhpStorm.
 * User: gnom
 * Date: 12.10.2018
 * Time: 12:53
 */

namespace app\controllers;

use app\events\SentTaskMailEvent;
use app\models\ContactForm;
use Yii;
use app\behaviors\MyBehaviors;
use app\models\tables\Task;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\Test;
use app\models\User;
use yii\base\Event;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\swiftmailer\Mailer;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\validators\MyValidator;
use yii\validators;

class TaskController extends Controller
{
    public function actionIndex()
    {

//        $user = new Users();
//        $user->login = 'qwerty';
//        $user->password = \Yii::$app->security->generatePasswordHash('qwerty');
//        $user->role_id = 2;
//        $user->save();


        $month = date('n');
//        $month = 11;
        $id = 1;

        $provider = new ActiveDataProvider([
            'query' => Tasks::getTaskCurrentMonth($month, $id)
        ]);


        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');
//        var_dump($users);

        return $this->render('index', [
            'provider' => $provider,
            'users' => $users
        ]);

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionTest()
    {
//        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event) {
//
//            $userEmail = Tasks::getUserEmail($event);
//
//            Yii::$app->mailer->compose()
//                ->setTo($userEmail->user->email)
//                ->setFrom(\Yii::$app->params['adminEmail'])
//                ->setSubject($event->sender->name)
//                ->setTextBody($event->sender->description)
//                ->send();
//        });


//        $task = new Tasks();
//        $task->name = 'Test send';
//        $task->description = 'new task';
//        $task->date = '2018-10-21';
//        $task->user_id = 4;
//        $task->save();

        //        $model = new Test;
//        $model->attachBehavior('my', [
//            'class' => MyBehaviors::class,
//            'massage' => 'sdvdsvsdvsdv'
//        ]);
//
//        $model->detachBehavior('my');
//
//        $model->title = '321';
//        $model->bar();
//        exit;
//        Event::on(Users::class, Users::EVENT_AFTER_INSERT, function ($event){
//            $task = new Tasks([
//                'name' => 'Ознакомиться с проектом',
//                'description' => 'Описаение задания',
//                'user_id' => $event->sender->id
//            ]);
//            $task->save();
//        });
//
//
//        $user = new Users();
//        $user->login = 'ivan';
//        $user->password = \Yii::$app->security->generatePasswordHash('qwerty');
//        $user->role_id = 2;
//        $user->save();
//
//
//        $handler1 = function ($event){
////            var_dump($event);
//            echo "первый обродобтчик сработал {$event->massage}";
//        };
//        Event::on(Test::class, Test::EVENT_FOO_START, $handler1);
//        $model = new Test();
//    //    $model->on(Test::EVENT_FOO_START, $handler1);
//        $model->foo();
//
////        $model->on(Test::EVENT_FOO_END, function (){
////            echo "второй обродобтчик сработал";
////        }
////        );
////
////        $model->on(Test::EVENT_FOO_START, [new \stdClass(), 'sxsasss']);
////
////        $model->foo();
////
////        $model->off(Test::EVENT_FOO_START, $handler1);
////        $model->foo();
//
//        exit;


    }
}