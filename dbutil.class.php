<?php 
	require_once('rb.php');


	class DBUtil  {
		
		//Merken, ob DB-Verbindung besteht
		private static $isInit = false;

	
		//*****************
		//*** ALLGEMEIN ***
		//*****************
		
		
		//DB-Verbindung aufbauen
	  public static function initDB(){
			if(!DBUtil::$isInit){
				R::setup( 'mysql:host=localhost;dbname=quiz','root', '' );  
				DBUtil::$isInit = true;
			}
		}
		
		//DB-Verbindung schließen
		public static function closeDB(){
				R::close();
				DBUtil::$isInit = false;
		}

		
		public static function checkLogin($name, $pwd){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			return R::findOne('logindata', 'name=:name and pwd=:pwd', [':name'=>$name, ':pwd'=>$pwd]);
		}
		
		public static function register($name, $pwd){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$ld = R::dispense('logindata');
			$ld->name = $name;
			$ld->pwd = $pwd;
			return R::store($ld);
		}

		public static function createCategory($cat_name, $description){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$ld = R::dispense('category');
			$ld->title = $cat_name;
			$ld->description = $description;
			return R::store($ld);
		}

		public static function buildQuestion($question, $answer_a, $answer_b, $answer_c, $answer_d, $right_answer, $quizname, $owner){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$ld = R::dispense('question');
			$ld->question = $question;
			$ld->answer_a = $answer_a;
			$ld->answer_b = $answer_b;
			$ld->answer_c = $answer_c;
			$ld->answer_d = $answer_d;
			$ld->right_answer = $right_answer;

			$o = R::findOne('logindata', 'name=:name', [':name'=>$owner]);
			$quiz = R::findOne('quiz', 'quizname=:quizname and owner_id=:owner', [':quizname'=>$quizname, ':owner'=>$o->id]);
			$quiz->xownQuestionList[]=$ld;
			
			R::store($ld);

			return R::store($quiz);
		}

		public static function getAllLogins(){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			return R::findAll('logindata');
		}	
		
		public static function getAllQuizzesPerOwner($owner){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$o = R::findOne('logindata', 'name=:name', [':name'=>$owner]);
			return R::findAll('quiz', 'owner_id=:owner', [':owner'=>$o->id] );
		}

		public static function getAllQuizzesPerCategory($category_id){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			return R::findAll('quiz', 'category_id=:category ORDER BY quizname ASC', [':category'=>$category_id] );
		}

				public static function getAllCategories(){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			return R::findAll('category', ' ORDER BY title ASC');
		}

		public static function getLogin($name){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			return R::findOne('logindata', 'name=:name', [':name'=>$name]);
		}		

		public static function deleteLogin($name){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$ld =  R::findOne('logindata', 'name=:name', [':name'=>$name]);
			if($ld != null) {
				R::trash($ld);
			}
		}	

		public static function deleteQuiz($id){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$ld =  R::findOne('quiz', 'id=:id', [':id'=>$id]);
			if($ld != null) {
				R::trash($ld);
			}
		}	
		
		public static function createQuiz($quizname, $quizdescription, $category_id, $owner){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			
			$ld = R::dispense('quiz');
			$ld->quizname = $quizname;
			$ld->quizdescription = $quizdescription;
			$ld->category = R::findOne('category', 'id=:id', [':id'=>$category_id]);
			$ld->owner = R::findOne('logindata', 'name=:name', [':name'=>$owner]);
			

			return R::store($ld);
		}

		public static function getQuestionsById($quizid){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$ld = R::findAll('question', 'quiz_id=:quiz_id', [':quiz_id'=>$quizid]);
			
			return R::exportAll($ld);
		}

		public static function setStats( $points, $maxPoints, $quizId, $owner){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$ld = R::dispense('stats');
    		$ld->points = $points;
    		$ld->maxpoints = $maxPoints; 
    		$ld->date= R::isoDateTime();   
    		$ld->quizid = R::findOne('quiz', 'id=:id', [':id'=>$quizId]);
			$ld->player = R::findOne('logindata', 'name=:name', [':name'=>$owner]); 
			
			return R::store($ld);
		}

		public static function getCountQuiz(){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			return R::getAll( 'SELECT quizid_id, count(quizid_id) from stats GROUP BY quizid_id' );
		}
		
		public static function getAllQuizzesPerTitelSearch($term){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$sql = 'SELECT q.id AS id, q.quizname AS name, q.quizdescription AS bes, c.title AS title FROM quiz AS q, category AS c WHERE c.id = q.category_id AND q.quizname LIKE :term ORDER BY q.id ';
			$rows = R::getAll($sql, [':term'=>'%'.$term.'%']);

			return R::convertToBeans('test', $rows);
		}
		
		
		public static function getAllQuizzesPerCategorySearch($term){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			
			$sql = 'SELECT q.id AS id, q.quizname AS name, q.quizdescription AS bes, c.title AS title FROM quiz AS q, category AS c WHERE c.id = q.category_id AND c.title LIKE :term ORDER BY q.id ';
			$rows = R::getAll($sql, [':term'=>'%'.$term.'%']);

			return R::convertToBeans('test', $rows);
		}
		
		public static function getAllQuizzesPerNumberSearch($term){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			
			$sql = 'SELECT q.id AS id, q.quizname AS name, q.quizdescription AS bes, c.title AS title FROM quiz AS q, category AS c WHERE c.id = q.category_id AND q.id LIKE :term ORDER BY q.id ';
			$rows = R::getAll($sql, [':term'=>'%'.$term.'%']);

			return R::convertToBeans('test', $rows);
		}

		public static function getRankingPlayer(){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$sql = 'SELECT p.id AS id, p.name AS name, COUNT(p.name) AS games, round((SUM(s.points)/SUM(s.maxpoints))*100,0) AS prozent FROM logindata AS p, stats AS s WHERE s.player_id = p.id GROUP BY p.name ORDER BY prozent DESC';
			$rows = R::getAll($sql);

			return R::convertToBeans('stats', $rows);
		
		}

		public static function getRankingQuiz(){
			if(!DBUtil::$isInit){
				DBUtil::initDB();
			}
			$sql = 'SELECT q.id AS id, q.quizname AS name, COUNT(s.quizid_id) AS games FROM quiz AS q, stats AS s WHERE s.quizid_id = q.id GROUP BY q.quizname ORDER BY games DESC';
			$rows = R::getAll($sql);

			return R::convertToBeans('stats', $rows);
		
		}

	}
 
 ?>