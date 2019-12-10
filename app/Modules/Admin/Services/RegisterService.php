<?php
/**
 * User: Administrator
 * Date: 2019/12/9
 * Time: 下午 3:12
 */

namespace App\Modules\Admin\Services;


use App\Modules\Common\BaseService;
use App\Repository\AdminRepository;

class RegisterService extends BaseService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function register($username, $mobilePhone, $password)
    {
        return $this->adminRepository->createAdminUser($username, $mobilePhone, $password);
    }

}
