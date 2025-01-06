<?php

class User {

    public $id;
    public $name;
    public $email;
    public $phone;
    public $birth;

    public function getInfo($id){

        require DB;
        $pdo = connectDB();

        $sql = "select name, email, phone, birth from Users where id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
        
        try {

            $stmt->execute();
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){  

                $this->name = $result['name'];
                $this->email = $result['email'];
                $this->phone = $result['phone'];
                $this->birth = $result['birth'];

            }

            return json_encode($this);

        // echo '查詢資料成功！';

        } catch (PDOException $e) {

          echo '查詢資料失敗：' . $e->getMessage();
          exit;

        }
    }

}
