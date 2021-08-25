<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->lastname = 'Bernoud';
        $admin->firstname = 'Simon';
        $admin->email = 'simon.bernoud@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Commandeur';
        $admin->firstname = 'Nicolas';
        $admin->email = 'nicolas.commandeur@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Brun';
        $admin->firstname = 'Aurélie';
        $admin->email = 'aurelie.brun@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Solivères';
        $admin->firstname = 'Raphaël';
        $admin->email = 'raphael.soliveres@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Duperrier';
        $admin->firstname = 'Arnaud';
        $admin->email = 'arnaud.duperrier@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Robert';
        $admin->firstname = 'Nicolas';
        $admin->email = 'nicolas.robert@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Bailly';
        $admin->firstname = 'Romain';
        $admin->email = 'romain.bailly@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Cornu';
        $admin->firstname = 'Christophe';
        $admin->email = 'christophe.cornu@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Beaumont';
        $admin->firstname = 'Tristan';
        $admin->email = 'tristan.beaumont@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Mottard';
        $admin->firstname = 'Joel';
        $admin->email = 'joel.mottard@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Arnaud-Prin';
        $admin->firstname = 'Jean-Charles';
        $admin->email = 'jean-charles.arnaud-prin@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Frederic';
        $admin->firstname = 'Pellerin';
        $admin->email = 'frederic.pellerin@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Pierre';
        $admin->firstname = 'Paccard';
        $admin->email = 'pierre.paccard@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Marion';
        $admin->firstname = 'Laffin';
        $admin->email = 'marion.laffin@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Xavier';
        $admin->firstname = 'Roux';
        $admin->email = 'xavier.roux@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Pascal';
        $admin->firstname = 'Combaz-Deville';
        $admin->email = 'pascal.combaz-deville@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Clement';
        $admin->firstname = 'Beuret';
        $admin->email = 'clement.beuret@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Holvoet';
        $admin->firstname = 'Martial';
        $admin->email = 'martial.holvoet@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'De-Righi';
        $admin->firstname = 'Veronique';
        $admin->email = 'veronique.de-righi@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Mitaut';
        $admin->firstname = 'Vincent';
        $admin->email = 'vincent.mitaut@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Bourland';
        $admin->firstname = 'Mathieu';
        $admin->email = 'mathieu.bourland@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Sebastien';
        $admin->firstname = 'Laguet';
        $admin->email = 'sebastien.laguet@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Benard';
        $admin->firstname = 'Julien';
        $admin->email = 'julien.benard@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Cusin';
        $admin->firstname = 'Jeremie';
        $admin->email = 'jeremie.cusin@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Laget';
        $admin->firstname = 'Lucile';
        $admin->email = 'lucile.laget@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Francoz';
        $admin->firstname = 'Frederic';
        $admin->email = 'frederic.francoz@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Fersing';
        $admin->firstname = 'Samuel';
        $admin->email = 'samuel.fersing@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Daum';
        $admin->firstname = 'Alexandre';
        $admin->email = 'alexandre.daum@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Bacher';
        $admin->firstname = 'Herve';
        $admin->email = 'herve.bacher@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Meilleur';
        $admin->firstname = 'Marc';
        $admin->email = 'marc.meilleur@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Rivory';
        $admin->firstname = 'Manon';
        $admin->email = 'manon.rivory@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Cerutti';
        $admin->firstname = 'Pascal';
        $admin->email = 'pascal.cerutti@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Noraz';
        $admin->firstname = 'Pierre-Olivier';
        $admin->email = 'pierre-olivier.noraz@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Rousson';
        $admin->firstname = 'Laurent';
        $admin->email = 'laurent.rousson@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Furet';
        $admin->firstname = 'Baptiste';
        $admin->email = 'baptiste.furet@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();

        $admin = new User();
        $admin->lastname = 'Portail';
        $admin->firstname = 'Clement';
        $admin->email = 'clement.portail@onf.fr';
        $admin->password = Hash::make('test');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();
    }
}
