<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return Product[]
     */
    public function findActive(){
        return $this
            ->createQueryBuilder('product')
            ->where('product.active = :active')
            ->setParameter('active', 1)
            ->getQuery()
            ->getResult();
    }

    public function findByCategory(Category $category){
        return $this
            ->createQueryBuilder('product')
            ->where('product.active = :active')
            ->andwhere('product.category = :category')
            ->setParameter('active', 1)
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();

    }
}
