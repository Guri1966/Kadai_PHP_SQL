<?php
// 固定処理 
if (isset($_POST['hold_id'])) {
    $hold_id = $_POST['hold_id'];
    try {
        //現在のinvalidを取得
        $sql = $dbh->prepare("SELECT invalid FROM `memo` WHERE id = ?");
        $sql->execute([$hold_id]);
        $current = $sql->fetchColumn();

        //invalidをトグル:0 → 1 , 1 → 0
        $new = ($current == 1) ? 0 : 1;

        //更新実行
        $sql = "UPDATE `memo` SET invalid = ? WHERE id = ?";
        $result = $dbh->prepare($sql);
        $result->execute([$new, $hold_id]);
    } catch (PDOException $e) {
        echo "エラー:" . $e->getMessage();
    }
}
