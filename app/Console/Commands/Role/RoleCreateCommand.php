<?php

namespace App\Console\Commands\Role;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class RoleCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:create {--name=} {--guard_name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command adds new role with --name with --guard_name flag';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option("name");
        $guardName = $this->option("guard_name");
        $checkRoleName = $this->checkRoleName($name, $guardName);
        if ($checkRoleName) {
            $role = Role::create([
                'name' => $name,
                'guard_name' => $guardName
            ]);
            $this->info("rol oluşturuldu.");
            $this->table(
                ['id', 'name', 'guard_name'],
                [$role->select('id', 'name', 'guard_name')
                      ->first()
                      ->toArray()]
            );
        }
    }

    public function checkRoleName($name, $guardName): bool
    {
        if ($name == null || $guardName == null) {
            $this->info("name ve guard_name alanları dolu olarak gönderilmelidir.");
            return false;
        }
        $role = Role::query()
            ->where("guard_name", $guardName)
            ->where("name", $name)
            ->first();
        if ($role) {
            $this->info("girilen bilgilerle daha önce rol oluşturulmuştur.");
            return false;
        }
        return true;

    }
}
