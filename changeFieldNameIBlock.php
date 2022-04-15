<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

//Change field names in Iblocks
class AddEnumValuesContract20220408100604242619 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $arFieldsContract = [];

        $rsFields = CIBlockProperty::GetList([], ["IBLOCK_ID" => 'IBLOCK_ID']);

        while ($field = $rsFields->Fetch()) {
            $arFieldsContract[$field['CODE']] = $field;
        }

        if (array_key_exists("FIELD_CODE", $arFieldsContract)) {
            //Change field type to List (L)
            $f = new \CIBlockProperty();
            $arFields = [
                'PROPERTY_TYPE' => 'L',
            ];
            $f->Update($arFieldsContract['FIELD_CODE']['ID'], $arFields);

            //Add enums to field
            $enum = new CIBlockPropertyEnum;

            $arValues = [
                'Value1',
                'Value2',
                'Value3',
            ];
            foreach ($arValues as $value) {
                $enum->add(['PROPERTY_ID' => $arFieldsContract['FIELD_CODE']['ID'], 'VALUE' => $value]);
            }
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
