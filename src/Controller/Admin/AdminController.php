<?php

namespace App\Controller\Admin;

use App\Entity\Applicant;
use App\Entity\Company;
use App\Entity\Experience;
use App\Entity\Mission;
use App\Entity\ProfileDetail;
use App\Entity\Skill;
use App\Entity\SkillCategory;
use App\Entity\SkillProfile;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Cefprojet');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Applicant', 'far fa-comments', Applicant::class);
        yield MenuItem::linkToCrud('Entreprise', 'far fa-comments', Company::class);
        yield MenuItem::linkToCrud('Experience', 'far fa-comments', Experience::class);
        yield MenuItem::linkToCrud('Missions', 'far fa-comments', Mission::class);
        yield MenuItem::linkToCrud('Details des Profils', 'far fa-comments', ProfileDetail::class);
        yield MenuItem::linkToCrud('Skill Categorie', 'far fa-comments', SkillCategory::class);
        yield MenuItem::linkToCrud('Skill', 'far fa-comments', Skill::class);
        yield MenuItem::linkToCrud('Profils de Skill', 'far fa-comments', SkillProfile::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'far fa-comments', User::class);

    return [
        // ...
        MenuItem::linkToLogout('Logout', 'fa fa-exit'),
    ];
    }
}
