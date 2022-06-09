<?php

namespace App\Controller\Admin;

use App\Entity\SkillProfile;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SkillProfileCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SkillProfile::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
