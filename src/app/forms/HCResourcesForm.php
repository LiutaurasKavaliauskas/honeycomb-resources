<?php

namespace interactivesolutions\honeycombresources\forms;

class HCResourcesForm
{
    // name of the form
    protected $formID = 'resources';

    // is form multi language
    protected $multiLanguage = 0;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     */
    public function createForm ($edit = false)
    {
        $form = [
            'storageURL' => route ('admin.api.resources'),
            'buttons'    => [
                [
                    "class" => "col-centered",
                    "label" => trans ('HCCoreUI::core.button.submit'),
                    "type"  => "submit",
                ],
            ],
            'structure'  => [[
                "type"            => "resource",
                "fieldID"         => "resource",
                "uploadURL"       => route("admin.api.resources"),
                "viewURL"         => route("resource.get", ['/']),
                "label"           => trans ("HCResources::resources.resource"),
                "required"        => 1,
                "requiredVisible" => 1,
            ]],
        ];

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
        $form['structure'] = array_merge ($form['structure'], [[
            "type"            => "singleLine",
            "fieldID"         => "original_name",
            "label"           => trans ("HCResources::resources.original_name"),
            "required"        => 1,
            "requiredVisible" => 1,
        ], [
            "type"            => "singleLine",
            "fieldID"         => "id",
            "label"           => trans ("HCResources::resources.safe_name"),
            "required"        => 1,
            "requiredVisible" => 1,
        ], [
            "type"            => "singleLine",
            "fieldID"         => "size",
            "label"           => trans ("HCResources::resources.size"),
            "required"        => 0,
            "requiredVisible" => 0,
        ], [
            "type"            => "singleLine",
            "fieldID"         => "path",
            "label"           => trans ("HCResources::resources.path"),
            "required"        => 0,
            "requiredVisible" => 0,
        ]]);

        return $form;
    }
}