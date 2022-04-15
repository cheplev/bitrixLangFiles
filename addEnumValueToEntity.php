<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AddEnumValueCompany20220415092433713221 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $obEnum = new \CUserFieldEnum;

        $arFieldsCompany = $GLOBALS['USER_FIELD_MANAGER']->GetUserFields("CRM_COMPANY");

        $bBlockId = $arFieldsCompany['UF_B_BLOCK']['ID'];

        //Delete all old vaules in field
        CUserFieldEnum::DeleteFieldEnum($bBlockId);

        $arFieldsValues = [
            'n0' => [
                'VALUE' => 'name_of_value',
                'DEF' => 'N', //default ?
            ],
            'n1' => [
                'VALUE' => 'name_of_value',
                'DEF' => 'N',
            ],
        ];

        //add new vaules in field

        $obEnum->SetEnumValues($bBlockId, $arFieldsValues);
    }

    /**
     * Reverse the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function down()
    {
        //
    }
}
