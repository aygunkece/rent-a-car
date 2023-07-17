<?php

namespace App\Services;

use App\Models\CompanyUsersPasswordResetToken;
use Illuminate\Support\Str;
use Exception;


class CompanyUsersPasswordResetTokenService
{
    public function __construct
    (
        public CompanyUsersPasswordResetToken $companyUsersPasswordResetToken
    )
    {

    }

    public function createRandomToken(int $length = 60): string
    {
        return Str::random($length);
    }

    public function createTokenWithEmail(string $email): CompanyUsersPasswordResetToken
    {
        $checkDuplicateControl = $this->checkDuplicateControl($email);
        if ($checkDuplicateControl) {
            return $checkDuplicateControl;
        }
        $token = $this->createRandomToken();

        return $this->companyUsersPasswordResetToken::create([
            'token' => $token,
            'email' => $email,
            'created_at' => now()
        ]);
    }

    public function checkDuplicateControl(string $email): CompanyUsersPasswordResetToken|false
    {
        $result = $this->getByEmail($email);
        if ($result && $this->checkTokenTime($result))
        {
            return $result;
        }
        else if ($result)
        {
            $this->deleteTokenByEmail($email);
        }
        return false;
    }

    public function deleteTokenByEmail($email): self
    {
        $tokenQuery = $this->companyUsersPasswordResetToken::query()
            ->where('email', $email);

        $token = $tokenQuery->first();
        if ($token)
        {
            $tokenQuery->delete();
        }
        return $this;
    }

    public function getByToken(string $token): null|CompanyUsersPasswordResetToken
    {
        return $this->companyUsersPasswordResetToken::query()
            ->where('token', $token)
            ->first();
    }

    public function getByEmail(string $email): null|CompanyUsersPasswordResetToken
    {
        return $this->companyUsersPasswordResetToken::query()
            ->where('email', $email)
            ->first();
    }

    public function getByTokenWithEmail(string $token, string $email): null|CompanyUsersPasswordResetToken
    {
        return $this->companyUsersPasswordResetToken::query()
            ->where('token', $token)
            ->where('email', $email)
            ->first();
    }

    public function checkTokenTime(CompanyUsersPasswordResetToken $checkToken): bool
    {
        if (now()->subHours(12) > $checkToken->created_at)
        {
            return false;
        }
        return true;
    }

    public function checkToken(string $token, string $email): bool
    {
        $result = $this->getByTokenWithEmail($token, $email);
        if (is_null($result))
        {
            throw new Exception("Lütfen email doğrulama adımını tekrar gerçekleştirin.");
        }
        $result = $this->checkTokenTime($result);

        if (!$result)
        {
            throw new Exception("Parola Oluşturma süreniz dolmuştur. Lütfen parolama sıfırlama işlemlerini tekrar yapınız.");
        }
        return true;
    }

}
