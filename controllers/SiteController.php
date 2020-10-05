<?php

namespace app\controllers;

use app\models\Blog;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\EmailForm;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->setMeta('Резюме', 'скилл, резюме, пхп, php, offer, yii2, framework', 'Услуги php программиста в Новосибирске, разработка сайтов, визиток, CMS');
        return $this->render('resume');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = 'Привет')
    {

        return $this->render('say', ['message' => $message]);
    }

    public function actionContactAdmin()
    {
        $model = new EmailForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->validate()) {
                $model->sendEmail(Yii::$app->params['adminEmail']); // send email
                Yii::$app->session->setFlash('success', 'Сообщение отправлено');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        $this->setMeta('Связаться с Администратором');
        return $this->render('feedback', compact('model'));
    }
    public function actionBloger()
    {
        $this->layout = simple;
        $this->view->title = 'Записи блога';
        $this->view->registerMetaTag(['name'=>'keywords', 'content' => 'keys1, 2, 3']);
        $this->view->registerMetaTag(['name'=>'description', 'content' => 'descr...']);

        //$posts = Blog::find()->all() ;
        //$posts = Blog::find()->orderBy(['post_id'=> SORT_DESC])->all(); //с обратной сортировкой
        //$posts = Blog::find()->asArray()->all(); // массивом, всего 1 запрос в БД
        //$posts = Blog::find()->asArray()->where('post_id = 1')->all(); //where
        //$posts = Blog::find()->asArray()->where(['post_id' => 1])->all(); //where (оператор, поле, значение)
        //$posts = Blog::find()->asArray()->where(['like', 'post_title', 'п'])->all(); //where %% в like писать не надо
       // $posts = Blog::find()->asArray()->where(['<=', 'post_id', 2])->all(); //where (оператор, поле, значение)

        //$posts = Blog::find()->asArray()->where(['<=', 'post_id', '2'])->limit(1)->all(); //where
       //$posts = Blog::find()->asArray()->where('post_id' <= '2')->limit(1)->all(); //where
      //$posts = Blog::find()->asArray()->where(['<=', 'post_id', '2'])->count(); //количество записей


        //$posts = Blog::find()->orderBy(['post_id'=> SORT_DESC])->one(); // ?!!?  с one не работает ?!!?

        //$posts = Blog::findOne(['post_id' <= 1]); //
        //$posts = Blog::findAll(['post_id' => '1']); //

            //не параметризированный
        //$query = "SELECT * FROM blog WHERE (post_title LIKE  '%та%')";
        //$posts = Blog::findBySql($query)->all();

            //параметризированный
        $query = "SELECT * FROM blog WHERE (post_title LIKE :search)";
        $posts = Blog::findBySql($query, [':search' => '%та%'])->all();
        return $this->render('simple', compact('posts'));
    }

    public function actionBlogpost()
    {
        /*ленивая и жадная загрузка данных*/
        $this->layout = simple;
       // $posts = Blog::findOne(1); // ленивая или отложенная загрузка
       // $posts = Blog::find()->all(); // ленивая или отложенная загрузка

        //жадная загрузка
        $posts = Blog::find()->with('postAuthorID')->where('post_author_id = 1')->all(); // жадная загрузка, используется with('метод связывания таблиц')



        return $this->render('simple', compact('posts'));
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Логин или пароль введены не верно.');
            }
        }
    }
}
