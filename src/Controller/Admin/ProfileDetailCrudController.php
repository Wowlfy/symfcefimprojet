<?php

namespace App\Controller\Admin;

use App\Entity\ProfileDetail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProfileDetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProfileDetail::class;
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
