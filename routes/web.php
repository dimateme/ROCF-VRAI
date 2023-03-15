<?php
/*
Auteur : David Tremblay
Date : Février 2023
Description : Routes de l'application ROCF assurant la gestion vers les controleurs
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UtilisateurController;

// Routes du Controller principal pour la redirection vers les vues de base
Route::get('/',                         [Controller::class, 'accueil'])->name('accueil');
Route::get('/accueil',                  [Controller::class, 'accueil'])->name('accueil');
Route::get('/partenaires',              [Controller::class, 'partenaires'])->name('partenaires');
Route::get('/connexion',                [Controller::class, 'connexion'])->name('connexion');

// Routes du Controller pour la gestion des utilisateurs et des rôles, session etc...
Route::post('/authentification',        [UtilisateurController::class, 'authentification']);
// Route pour la déconnexion (en post)
Route::get('/deconnexion',             [UtilisateurController::class, 'deconnexion'])->name('deconnexion');

// Routes pour l'administration
Route::get('/admin/gestion',   [UtilisateurController::class, 'admin_gestion'])->name('admin.gestion');

// Gestion Tables de concertation
Route::get('/admin/gestion/tables_concertation/', [UtilisateurController::class, 'admin_gestion_tables_concertation'])->name('admin.gestion.tables_concertation');
Route::post('/admin/ajouter/tables_concertation/', [UtilisateurController::class, 'admin_ajouter_tables_concertation'])->name('admin.ajouter.tables_concertation');
Route::post('/admin/modifier/tables_concertation/{id}', [UtilisateurController::class, 'admin_modifier_tables_concertation'])->name('admin.modifier.tables_concertation');
Route::get('/admin/supprimer/tables_concertation/{id}', [UtilisateurController::class, 'admin_supprimer_tables_concertation'])->name('admin.supprimer.tables_concertation');

// Gestion Utilisateurs
Route::get('/admin/gestion/utilisateurs',   [UtilisateurController::class, 'admin_gestion_utilisateurs'])->name('admin.gestion.utilisateurs');
Route::post('/admin/ajouter/utilisateurs',  [UtilisateurController::class, 'admin_ajouter_utilisateurs'])->name('admin.ajouter.utilisateurs');
Route::post('/admin/modifier/utilisateurs/{id}', [UtilisateurController::class, 'admin_modifier_utilisateurs'])->name('modifier.utilisateur');
Route::get('/admin/supprimer/utilisateurs/{id}', [UtilisateurController::class, 'admin_supprimer_utilisateurs'])->name('supprimer.utilisateur');

// Gestion Partenaires
Route::get('/admin/gestion/partenaires',   [UtilisateurController::class, 'admin_gestion_partenaires'])->name('admin.gestion.partenaires');
Route::post('/admin/ajouter/partenaires',  [UtilisateurController::class, 'admin_ajouter_partenaires'])->name('admin.ajouter.partenaires');
Route::post('/admin/modifier/partenaires/{id}', [UtilisateurController::class, 'admin_modifier_partenaires'])->name('modifier.partenaire');
Route::get('/admin/supprimer/partenaires/{id}', [UtilisateurController::class, 'admin_supprimer_partenaires'])->name('supprimer.partenaire');


// Gestion Directions
Route::get('/admin/gestion/directions',   [UtilisateurController::class, 'admin_gestion_directions'])->name('admin.gestion.directions');
Route::post('/admin/ajouter/directions',  [UtilisateurController::class, 'admin_ajouter_directions'])->name('admin.ajouter.directions');
Route::post('/admin/modifier/directions/{id}', [UtilisateurController::class, 'admin_modifier_directions'])->name('admin.modifier.direction');
Route::get('/admin/supprimer/directions/{id}', [UtilisateurController::class, 'admin_supprimer_directions'])->name('admin.supprimer.direction');


