<?php
    /**
     * Created by PhpStorm.
     * User: Ange KOUAKOU
     * Date: 02/11/2015
     * Time: 11:47
     */

    if (isset($_POST['code_four'])) {

        $code = $_POST['code_four'];
        include 'class_fournisseurs.php';

        $fournisseur = new fournisseurs();

        if ($fournisseur->recuperation()) {
            if ($_POST['action'] == "maj") {
                if ($fournisseur->modification($code)) {
                    header("refresh:3;url=form_principale.php?page=administration&source=fournisseurs");
                    echo "
            <div style='width: 80%; margin-right: auto; margin-left: auto; margin-top: 10%'>
                <div class='alert alert-success alert-dismissible' role='alert' style='width: 60%; margin-right: auto; margin-left: auto'>
                    <a href='form_principale.php?page=administration&source=fournisseurs' type='button' class='close'
                           data-dismiss='alert' aria-label='Close' style='position: inherit'>
                            <span aria-hidden='true'>&times;</span>
                        </a>
                    <p><strong>Succès!</strong><br/> Les informations sur le fournisseur " . $code . " ont été mises a jour.</p>
                </div>
            </div>
            ";
                }
            } elseif ($_POST['action'] == "supprimer") {
                if ($fournisseur->suppression($code)) {
                    header("refresh:3;url=form_principale.php?page=administration&source=fournisseurs");
                    echo "
            <div style='width: 80%; margin-right: auto; margin-left: auto; margin-top: 10%'>
                <div class='alert alert-success alert-dismissible' role='alert' style='width: 60%; margin-right: auto; margin-left: auto'>
                    <a href='form_principale.php?page=administration&source=fournisseurs' type='button' class='close'
                           data-dismiss='alert' aria-label='Close' style='position: inherit'>
                            <span aria-hidden='true'>&times;</span>
                        </a>
                    <strong>Succès!</strong><br/> Le fournisseur " . $code . " a été supprimé de la base.
                </div>
            </div>
            ";
                } else {
                    echo "
                    <div style='width: 80%; margin-right: auto; margin-left: auto; margin-top: 10%'>
                        <div class='alert alert-warning alert-dismissible' role='alert' style='width: 60%; margin-right: auto; margin-left: auto'>
                            <a href='form_principale.php?page=administration&source=fournisseurs' type='button' class='close'
                                   data-dismiss='alert' aria-label='Close' style='position: inherit'>
                                    <span aria-hidden='true'>&times;</span>
                            </a>
                            <strong>Erreur!</strong><br/>
                            Le fournisseur " . $code . " est lié à certains formulaires et ne peut donc pas être supprimé de la base.<br/>Veuillez donc contacter un administrateur.
                        </div>
                    </div>
                    ";
                }
            } else {
                echo "
                <div style='width: 80%; margin-right: auto; margin-left: auto; margin-top: 10%'>
                    <div class='alert alert-danger alert-dismissible' role='alert' style='width: 60%; margin-right: auto; margin-left: auto'>
                        <a href='form_principale.php?page=administration&source=fournisseurs' type='button' class='close'
                               data-dismiss='alert' aria-label='Close' style='position: inherit'>
                                <span aria-hidden='true'>&times;</span>
                        </a>
                        <strong>Erreur!</strong><br/>
                        Une erreur s'est produite lors de la tentative de récupération des informations entrées.<br/>
                        Veuillez contacter votre administrateur.
                    </div>
                </div>
                ";
            }
        }
    }