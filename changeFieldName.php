<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class ChangeFieldLangName20220329084850047240 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $arFieldsContact = $GLOBALS['USER_FIELD_MANAGER']->GetUserFields("CRM_CONTACT");
        $arFieldsDeal = $GLOBALS['USER_FIELD_MANAGER']->GetUserFields("CRM_DEAL");


        if (array_key_exists("FIELD_CODE", $arFieldsContact)) {
            $f = new \CUserTypeEntity();
            $arLangFields = [
                'EDIT_FORM_LABEL' => ['ru' => 'NEW_NAME_RU', 'en' => 'NEW_NAME_EN'],
                'LIST_COLUMN_LABEL' => ['ru' => 'NEW_NAME_RU', 'en' => 'NEW_NAME_EN'],
                'LIST_FILTER_LABEL' => ['ru' => 'NEW_NAME_RU', 'en' => 'NEW_NAME_EN']
            ];
            $f->Update($arFieldsContact['FIELD_CODE']['ID'], $arLangFields);
        }
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
