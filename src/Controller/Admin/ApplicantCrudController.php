<?php

namespace App\Controller\Admin;

use App\Entity\Applicant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ApplicantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Applicant::class;
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
