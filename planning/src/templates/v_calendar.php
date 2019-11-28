<?php

require_once("./templates/v_header.php");
?>

<form action="../index.php" method="post">
<div class="row">
    <div class="col-9">
        <div class="row mb-4">
            <? 
            foreach ($mondays as $monday) {
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body py-1">
                            <div class="form-group row" style="margin-bottom: 0px">
                                <label for="choose_user" class="col-6 col-form-label"><? echo $monday ?></label>
                                <select name="<? echo $monday ?>" class="form-control col-6 choose_user">
                                    <?
                                    // Get user assign to this monday
                                    $query = new MongoDB\Driver\Query(["assign" => $monday]);
                                    $result = $mng->executeQuery("planning.assignments", $query)->toArray();
                                    $query_user = new MongoDB\Driver\Query(["_id" => new \MongoDB\BSON\ObjectId($result[0]->user_id)]);
                                    $user = $mng->executeQuery("planning.users", $query_user)->toArray();

                                    // Shuffle if no result
                                    shuffle($users);
                                    
                                    // else put the user on index 0 of $users Array
                                    if(!empty($user[0]->name)) {
                                        echo"oui";
                                        sort($users);
                                        foreach($users as $k => $u) {
                                            if ($user[0]->name == $u->name) {
                                                array_splice($users, $k, 1);
                                                array_unshift($users, $u);
                                            }
                                        }
                                    }                            
                                    foreach($users as $user) {
                                        ?>
                                        <option class="bg-<? echo $user->name ?>" value="<? echo $user->name ?>"><? echo $user->name ?></option>
                                        <?
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <?
            }
            ?>
        </div>
    </div>

<? // ======================== Statistics ======================== ?>

    <div class="col-3">
        <h3 class="display-6 mb-4">Statistiques:</h3>
        <ul class="list-group list-group-flush">
            <?
            foreach($occ_users as $name => $occ) {
                ?>
                <li class="list-group-item bg-<? echo $name ?>"><? echo $name ?> : <? echo $occ ?></li>
                <?
            }
            ?>
        </ul>
        <? // =========== Reset button ===========?>
        <a href="./controllers/reset.php" class="mt-5 btn btn-block btn-warning">Reset</a>
    </div>
</div>

<button class="btn btn-lg btn-block btn-info" type="submit">Valider planning</button>
</form>

<?php

require_once("./templates/v_footer.php");