<?php




class Post extends User
{
    protected $pdo;

    public function __construct($pdo)
    {

        $this->pdo = $pdo;
    }

    public function posts($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `post` LEFT JOIN `users` ON `postBy` = `user_id` WHERE `PostBy` = :user_id");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        // $stmt->bindParam(":num", $num, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($posts as $post) {


            echo '<div id="' . $post->postID . '" class="backgroundColor">
            <h2>記録日時: ' . $post->posetdOn . '</h2>
            ' . ((!empty($post->postImage)) ? '<img src="' . $post->postImage . '">' : '') . '
            <h2>○タイトル</h2>
            <p>' . $post->title . '</p>
            <h2>○学んだこと</h2>
            <li>' . $post->learn1 . '</li>
            <li>' . $post->learn2 . '</li>
            <li>' . $post->learn3 . '</li>
            <h2>○日々の生活の中で生かせそうなこと</h2>
            <li>' . $post->output1 . '</li>
            <li>' . $post->output2 . '</li>
            <li>' . $post->output3 . '</li>
            <h2>○感想</h2>
            <div>' . $post->status . '</div>
            <div class="content">
            <button class="delete-btn" data-post="' . $post->postID . '">削除する</button>
            </div>
        </div>';
        }
    }


    public function PostPopup($post_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `post`,`users` WHERE `postID` = :post_id and `user_id` = `postBy`");
        $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
