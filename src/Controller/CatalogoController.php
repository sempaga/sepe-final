<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Fondo;
use App\FakeData\Catalogo;    // <==== IMPORTANTE
use App\Repository\FondoRepository;
use App\Repository\EditorialRepository;
use App\Repository\AutorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogoController extends AbstractController
{
    
    public function index(FondoRepository $fondoRepository): Response
    {
        //$fondos = Catalogo::$fondos;
        $fondos = $fondoRepository->findAll();

        $colores = ['rojo', 'amarillo', 'verde'];

        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos,
            'colores' => $colores
        ]);
    }

 
    public function ver(FondoRepository $fondoRepository, $id): Response
    {
        $fondo = $fondoRepository->find($id);
        return $this->render('catalogo/ver.html.twig', [
            'fondo' => $fondo
        ]);
    }

   
    public function cce(
        EditorialRepository $editorialRepository,
        AutorRepository $autorRepository,
        FondoRepository $fondoRepository,
        EntityManagerInterface $em
        ): Response
    {
        $editorialNombre = 'Seix Barral';
        $autorId = 3;

        $titulo = 'Symfony: The Fast Track';
        $isbn = '84-204-6583-5';
        $edicion = 2005;
        $publicacion = 2005;
        $categoria = 'Ficción';
        
        $editorial = $editorialRepository->findOneByNombre($editorialNombre);
        $autor = $autorRepository->find($autorId);

        $fondo = new Fondo();
        $fondo->setTitulo($titulo);
        $fondo->setIsbn($isbn);
        $fondo->setEdicion($edicion);
        $fondo->setPublicacion($publicacion);
        $fondo->setCategoria($categoria);
        $fondo->setEditorial($editorial);
        $fondo->addAutor($autor);

        $em->persist($fondo);
        $em->flush();

        $fondos = $fondoRepository->findAll();

        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos
        ]);
    }

   
    public function modificar(
        FondoRepository $fondoRepository,
        EntityManagerInterface $em
        ): Response
    {
        $id = 3;
        $publicacion = 2006;
        
        $fondo = $fondoRepository->find($id);
        $fondo->setPublicacion($publicacion);

        $em->persist($fondo);
        $em->flush();

        $fondos = $fondoRepository->findAll();

        return $this->render('catalogo/index.html.twig', [
            'fondos' => $fondos
        ]);
    }
}