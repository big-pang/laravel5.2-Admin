<?php namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
     * update
     * @param array $PermissionsId
     */
    public function givePermissionsTo(array $PermissionsId){
        $this->detachPermissions($this->perms);
        $this->attachPermissionToId($PermissionsId);
    }

    /**
     * Attach multiple $PermissionsId to a user
     *
     *
     */
    public function attachPermissionToId($PermissionsId)
    {
        foreach ($PermissionsId as $pid) {
            $this->attachPermission($pid);
        }
    }
}