<?php

namespace App\Http\Controllers;

use App\Models\Concertation;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Direction;
use Illuminate\Support\Facades\Hash;


class UtilisateurController extends Controller
{
    // Fonction pour l'authentification
    public function authentification(Request $request)
    {
        $request->validate
        ([
            'courriel' => ['required', 'string', 'min:5', 'max:35' ],
            'mdp' =>
            [
                'required',
                'string',
                'min:3',             // doit avoir au moins 8 caractères
                'regex:/[a-z]/',      // doit contenir au moins une lettre minuscule
                'regex:/[A-Z]/',      // doit contenir au moins une lettre majuscule
                'regex:/[0-9]/',      // doit contenir au moins un chiffre
                'regex:/[@$!%*#?&]/', // doit contenir au moins un caractère spécial
            ],
        ]);

        // Récupération des données du formulaire
        $unCourriel = request('courriel');

        //get user from database by email
        $unUtilisateur = Utilisateur::where('courriel', $unCourriel)->first();
        if ($unUtilisateur)
        {
            // Vérification du mot de passe
            $request->session()->put('courriel', $unUtilisateur);
            $request->session()->put('role', $unUtilisateur->role);
            if ((Hash::check(request('mdp'), $unUtilisateur->mdp) && $unUtilisateur->id_role == 1)) // 1 == admin
            {
                $courriel = $unUtilisateur->courriel;
                $request->session()->put('courriel', $courriel);
                $request->session()->put('role', $unUtilisateur->role);
                return redirect('admin/gestion');
            }
            else if ((Hash::check(request('mdp'), $unUtilisateur->mdp) && $unUtilisateur->id_role == 2))
            {
                dd('direction');
                //return view('utilisateur.utilisateur');
            }
            else
            {
                return redirect('/connexion');
            }
        }
        else
        {
            return redirect('/connexion')->with('erreur', 'Mot de passe incorrect');
        }
    }

    // Fonction pour la déconnexion
    public function deconnexion(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('accueil');
    }


//    public function admin_gestion_tables_concertation()
//    {
//        return view('admin.gestion_tables_concertation');
//    }

    public function admin_gestion()
    {
        return view('admin.gestion');
    }

    // Fonction pour afficher la page de gestion des utilisateurs
    public function admin_gestion_utilisateurs(Request $request)
    {
        //les directions
        $lesDirections = Direction::all();
        //les roles
        $lesRoles = Role::all();
        $lesUtilisateurs = Utilisateur::with('direction')->get();
        $directions = Direction::with('utilisateurs')->get();
        return view('admin.gestion_utilisateurs')->with('lesDirections', $lesDirections)->with('lesRoles', $lesRoles)
            ->with('lesUtilisateurs', $lesUtilisateurs)->with('directions', $directions);
    }

    // Fonction (POST) pour l'ajout d'un utilisateur
    public function admin_ajouter_utilisateurs(Request $request)
    {
        //Validation des données
        $request->validate([
            'courriel' => ['required', 'string', 'min:5', 'max:35' ],
            'nom' => ['required', 'string',  'min:3', 'max:10'],
            'prenom' => ['required', 'string',  'min:3', 'max:10'],
            'code_postal' => ['required', 'string',  'min:7', 'max:7'],
            'mdp' => [
                   'required',
                    'string',
                    'min:8',             // doit avoir au moins 8 caractères
                    'regex:/[a-z]/',      // doit contenir au moins une lettre minuscule
                    'regex:/[A-Z]/',      // doit contenir au moins une lettre majuscule
                    'regex:/[0-9]/',      // doit contenir au moins un chiffre
                    'regex:/[@$!%*#?&]/', // doit contenir au moins un caractère spécial

            ],
            'telephone' => ['required', 'string',  'min:10', 'max:14'],
            'role' => ['required', 'integer'],
            'direction' => ['required', 'integer']
        ]);

        //Recuperation des données et ajout dans la BD
        $unUtilisateur = new Utilisateur();
        $unUtilisateur->courriel = $request->input('courriel');
        $unUtilisateur->nom = $request->input('nom');
        $unUtilisateur->prenom = $request->input('prenom');
        $unUtilisateur->code_postal = $request->input('code_postal');
        //hashage du mot de passe
        $unUtilisateur->mdp = Hash::make($request->input('mdp'));
        $unUtilisateur->telephone = $request->input('telephone');
        $unUtilisateur->id_role = $request->input('role');
        $unUtilisateur->id_direction = $request->input('direction');
        $unUtilisateur->save();
        return redirect()->back();
    }
    //modier un utilisateur
    public function admin_modifier_utilisateurs(Request $request, $id)
    {

        //Validation des données
        $request->validate([
            'courriel' => ['required', 'string', 'min:5', 'max:35' ],
            'nom' => ['required', 'string',  'min:3', 'max:10'],
            'prenom' => ['required', 'string',  'min:3', 'max:10'],
            'role' => ['required', 'integer'],
            'direction' => ['required', 'integer']
        ]);

        //Recuperation des données et ajout dans la BD
        $unUtilisateur = Utilisateur::find($id);
        $unUtilisateur->courriel = $request->input('courriel');
        $unUtilisateur->nom = $request->input('nom');
        $unUtilisateur->prenom = $request->input('prenom');
        $unUtilisateur->id_role = $request->input('role');
        $unUtilisateur->id_direction = $request->input('direction');
        //dd($unUtilisateur);

        $unUtilisateur->save();
        return redirect()->back();
    }
    //supprimer un utilisateur
    public function admin_supprimer_utilisateurs(Request $request, $id)
    {
        $unUtilisateur = Utilisateur::find($id);
        $unUtilisateur->delete();
        return redirect()->back();
    }

    // fonction qui permet d'afficher la page de gestion des partenaires
    public function admin_gestion_partenaires()
    {
        $lesPartenaires = Partenaire::all();
        return view('admin.gestion_partenaires')->with('lesPartenaires', $lesPartenaires);
    }
    // fonction qui permet d'ajouter un partenaire
    function admin_ajouter_partenaires(){

        $unPartenaire = new Partenaire();
        $unPartenaire->partenaire = request('partenaire');
        $unPartenaire->save();
        return redirect()->back();
    }
    // fonction qui permet de modifier un partenaire
    function admin_modifier_partenaires($id){

        $unPartenaire = Partenaire::find($id);
        $unPartenaire->partenaire = request('partenaire');
        $unPartenaire->save();
        return redirect()->back();
    }
    // fonction qui permet de supprimer un partenaire
    function admin_supprimer_partenaires(){

            $unPartenaire = Partenaire::find(request('id'));
            $unPartenaire->delete();
            return redirect()->back();
    }
    //fonction qui permet d'ajouter la table de concertation
    function admin_ajouter_tables_concertation(){
        $uneConcertation = new Concertation();
        $uneConcertation->concertation = request('concertation');
//        dd($uneConcertation);
        $uneConcertation->save();
        return redirect()->back();
    }
    //foncion qui permet d'afficher la table de concertation
    function admin_gestion_tables_concertation(){
        $lesConcertations = Concertation::all();
        return view('admin.gestion_tables_concertation')->with('lesConcertations', $lesConcertations);
    }
    //fonction qui permet de modifier la table de concertation
    function admin_modifier_tables_concertation($id){
        $uneConcertation = Concertation::find($id);
        $uneConcertation->concertation = request('concertation');
        $uneConcertation->save();
        return redirect()->back();
    }
    //fonction qui permet de supprimer la table de concertation
    function admin_supprimer_tables_concertation(){
        $uneConcertation = Concertation::find(request('id'));
        $uneConcertation->delete();
        return redirect()->back();
    }
    //fonction qui permet d'afficher la page de gestion des directions
    function admin_gestion_directions(){
        $lesDirections = Direction::all();
        return view('admin.gestion_directions')->with('lesDirections', $lesDirections);
    }


}
