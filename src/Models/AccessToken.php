<?php

namespace AdvancedLearning\Oauth2Server\Models;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

/**
 * Class AccessToken
 *
 * @package AdvancedLearning\Oauth2Server\Models
 *
 * @property string $Identifier
 * @property string $Scopes
 * @property string $Name
 * @property string $ExpiryDateTime
 * @property bool   $Revoked
 */
class AccessToken extends DataObject
{
    private static $table_name = 'OauthAccessToken';

    private static $db = [
        'Identifier' => 'Varchar(255)',
        'Scopes' => 'Text',
        'Name' => 'Varchar(255)',
        'ExpireDateTime' => 'Datetime',
        'Revoked' => 'Boolean'
    ];

    private static $summary_fields = [
        'Name',
        'ExpireDateTime',
        'Revoked'
    ];

    /**
     * Get the Member associated with this AccessToken.
     *
     * @return Member
     */
    public function getMember()
    {
        return Member::get()->byID($this->Identifier);
    }
}
