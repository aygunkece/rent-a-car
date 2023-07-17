<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleService
{

    public function __construct(public Role $role)
    {

    }

    public function roleAssignmentProcess($user, string $guardName, string $roleName)
    {
        switch ($guardName)
        {
            case "company":
                $role = $this->getRoleCompanyWithName($roleName);
                if ($role) {
                    return $user->syncRoles($role);
                }
                throw new NotFoundHttpException();
                break;
            case "rsa":
                break;
            case "member":
                break;
        }
    }

    /**
     * @param string $roleName
     * @return Role|null
     * @comment Role modeli oluşturup, where koşulu ile guard_name'in company,
     * name'in $roleName 'de ne yazıyorsa onun ilkini alır.Geriye roles tablosunda role veya null döner.
     */
    public function getRoleCompanyWithName(string $roleName): Role|null
    {
        return $this->role::query()
            ->where("guard_name", "company")
            ->where("name", $roleName)
            ->first();
    }
}
