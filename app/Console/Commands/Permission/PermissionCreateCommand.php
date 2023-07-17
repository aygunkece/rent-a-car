<?php

namespace App\Console\Commands\Permission;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class PermissionCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create {--name=} {--guard_name=} {--group=} {--description=null}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command adds new permission with --name, --guard_name, --group and --description flags. The default value of the --description flag is null';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name');
        $guardName = $this->option('guard_name');
        $group = $this->option('group');
        $description = $this->option('description');

        $checkPermissionName = $this->checkPermissionName($name, $guardName, $group);
        if ($checkPermissionName) {
            $permission = Permission::create([
                'name' => $name,
                'guard_name' => $guardName,
                'group' => $group,
                'description' => $description
            ]);
            $this->info('Permission oluşturuldu.');
            $this->table(
                ['id', 'name', 'guard_name', 'group', 'description'],
                [$permission->select('id', 'name', 'guard_name', 'group', 'description')->latest()->first()->toArray()]
            );
        }
    }

    public function checkPermissionName($name, $guardName, $group): bool
    {
        if (is_null($name) || is_null($guardName) || is_null($group)) {
            $this->info('name, guard_name ve group alanları dolu olarak gönderilmelidir.');
            return false;
        }
        $permission = Permission::query()
            ->where('name', $name)
            ->where('guard_name', $guardName)
            ->where('group', $group)
            ->first();
        if ($permission) {
            $this->info('Girilen bilgiler ile daha önce permission oluşturulmuştur.');
            return false;
        }
        return true;
    }
}
