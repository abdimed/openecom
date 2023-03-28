<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $permissions = [
        ['name' => 'dashboard access', 'alias' => 'Acces Tableau de bord'],

        ['name' => 'brand viewAny', 'alias' => 'Marque: voir tout'],
        ['name' => 'brand view', 'alias' => 'Marque: voir'],
        ['name' => 'brand create', 'alias' => 'Marque: crée'],
        ['name' => 'brand update', 'alias' => 'Marque: modifier'],
        ['name' => 'brand delete', 'alias' => 'Marque: suprimer'],
        ['name' => 'brand restore', 'alias' => 'Marque: restaurer'],
        ['name' => 'brand forceDelete', 'alias' => 'Marque: forcer la supréssion'],

        ['name' => 'category viewAny', 'alias' => 'Categorie: voir tout'],
        ['name' => 'category view', 'alias' => 'Categorie: voir'],
        ['name' => 'category create', 'alias' => 'Categorie: crée'],
        ['name' => 'category update', 'alias' => 'Categorie: modifier'],
        ['name' => 'category delete', 'alias' => 'Categorie: suprimer'],
        ['name' => 'category restore', 'alias' => 'Categorie: restaurer'],
        ['name' => 'category forceDelete', 'alias' => 'Categorie: forcer la supréssion'],

        ['name' => 'customer viewAny', 'alias' => 'Client: voir tout'],
        ['name' => 'customer view', 'alias' => 'Client: voir'],
        ['name' => 'customer create', 'alias' => 'Client: crée'],
        ['name' => 'customer update', 'alias' => 'Client: modifier'],
        ['name' => 'customer delete', 'alias' => 'Client: suprimer'],
        ['name' => 'customer restore', 'alias' => 'Client: restaurer'],
        ['name' => 'customer forceDelete', 'alias' => 'Client: forcer la supréssion'],

        ['name' => 'order viewAny', 'alias' => 'Commande: voir tout'],
        ['name' => 'order view', 'alias' => 'Commande: voir'],
        ['name' => 'order create', 'alias' => 'Commande: crée'],
        ['name' => 'order update', 'alias' => 'Commande: modifier'],
        ['name' => 'order delete', 'alias' => 'Commande: suprimer'],
        ['name' => 'order restore', 'alias' => 'Commande: restaurer'],
        ['name' => 'order forceDelete', 'alias' => 'Commande: forcer la supréssion'],

        ['name' => 'product viewAny', 'alias' => 'Produit: voir tout'],
        ['name' => 'product view', 'alias' => 'Produit: voir'],
        ['name' => 'product create', 'alias' => 'Produit: crée'],
        ['name' => 'product update', 'alias' => 'Produit: modifier'],
        ['name' => 'product delete', 'alias' => 'Produit: suprimer'],
        ['name' => 'product restore', 'alias' => 'Produit: restaurer'],
        ['name' => 'product forceDelete', 'alias' => 'Produit: forcer la supréssion'],

        ['name' => 'role viewAny', 'alias' => 'Role: voir tout'],
        ['name' => 'role view', 'alias' => 'Role: voir'],
        ['name' => 'role create', 'alias' => 'Role: crée'],
        ['name' => 'role update', 'alias' => 'Role: modifier'],
        ['name' => 'role delete', 'alias' => 'Role: suprimer'],
        ['name' => 'role restore', 'alias' => 'Role: restaurer'],
        ['name' => 'role forceDelete', 'alias' => 'Role: forcer la supréssion'],

        ['name' => 'user viewAny', 'alias' => 'Utilisateur: voir tout'],
        ['name' => 'user view', 'alias' => 'Utilisateur: voir'],
        ['name' => 'user create', 'alias' => 'Utilisateur: crée'],
        ['name' => 'user update', 'alias' => 'Utilisateur: modifier'],
        ['name' => 'user delete', 'alias' => 'Utilisateur: suprimer'],
        ['name' => 'user restore', 'alias' => 'Utilisateur: restaurer'],
        ['name' => 'user forceDelete', 'alias' => 'Utilisateur: forcer la supréssion'],



    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach ($this->permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'alias' => $permission['alias']
            ]);
        }
    }
}
