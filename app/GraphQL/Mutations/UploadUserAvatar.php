<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class UploadUserAvatar
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $file = $args['image'];
        $path = $file->storePublicly('public/uploads');
        $user = User::find($args['id']);
        $user->update(['avatar' => $path]);
        return $user;
    }
}
