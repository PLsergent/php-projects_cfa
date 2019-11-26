<?php

require_once("./templates/v_header.php");
?>

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
                                <select class="form-control col-6 choose_user">
                                    <?
                                    shuffle($users);
                                    foreach ($users as $user) {
                                        ?>
                                        <option class="bg-<? echo $user->name ?>" value="<? echo $user->name ?>"><? echo $user->name ?></option>
                                        <?
                                    }
                                    ?>
                                    <option class="bg-Personne" value="Personne">Personne</option>
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
    <div class="col-3">
        <h3 class="display-6">Statistiques:</h3>
            <ol>
                <li></li>
            </ol>
    </div>
</div>

<button class="btn btn-lg btn-block btn-info" type="submit">Valider planning</button>


<?php

require_once("./templates/v_footer.php");