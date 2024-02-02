<?php
namespace Ijdb\Repositories;
use \Ninja\DatabaseTable;

class ProductRepository extends DatabaseTable
{
    private function defineFieldAndOrder($value)
    {
        switch ($value)
        {
            case 'title':
                return ['field'=>'p.title', 'order'=>'asc'];
            case 'price':    
                return ['field'=>'pl.price', 'order'=>'asc'];
            case 'price_desc':    
                return ['field'=>'pl.price', 'order'=>'desc'];           
        }
        return ['field'=>'title', 'order'=>'asc'];
    }
    public function findAllProducts($categoryId, $page = 0, $sort = 'title', $search = '', $producers = [] )
    {
        $sort = $this->defineFieldAndOrder($sort);
        $field = $sort['field'];
        $order = $sort['order'];
        $search = trim($search);
      
        $conditions = '';
        if(!empty($producers))
        {
            $conditions = sprintf('AND p.producer_id IN (%s)', implode(',', $producers));
            $conditions = htmlspecialchars($conditions);
        }
        $query = "SELECT 
        p.*,
        pl.price, 
        pr.name as producer_name
        FROM `products` p
        LEFT JOIN `producers` pr ON p.producer_id=pr.id
        LEFT JOIN (SELECT product_id, brutto_price as price, max(created)  FROM pricelist GROUP BY product_id) pl ON pl.product_id = p.id
        WHERE
        p.category_id=$categoryId 
        $conditions
        AND
        p.visible = 1
        AND (p.title LIKE '$search%' OR pr.name LIKE '$search%' OR p.code LIKE '$search%')
        ORDER BY
        CASE 
            WHEN pl.price IS NULL THEN 2 
            WHEN pl.price = 0 THEN 1 
            ELSE 0 
        END, 
        $field $order
        LIMIT $page, 12";

        return $this->query($query)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findAllProducers($categoryId)
    {
        return $this->query("SELECT 
            pr.id,
            pr.name
            FROM `products` p
            LEFT JOIN `producers` pr ON p.producer_id=pr.id
            WHERE
            p.visible = 1 
            AND
            p.category_id=$categoryId
            GROUP BY pr.id, pr.name
           ")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function totalProducts($categoryId, $search = '', $producers = []) {
        $conditions = '';
        $search = trim($search);
        if(!empty($producers))
        {
            $conditions = sprintf('AND p.producer_id IN (%s)', implode(',', $producers));
            $conditions = htmlspecialchars($conditions);
        }
		$query = $this->query("SELECT 
            COUNT(*) 
            FROM `products` p
            LEFT JOIN `producers` pr ON p.producer_id=pr.id
            WHERE 
            p.category_id=$categoryId
            AND p.visible = 1
            $conditions
            AND (p.title LIKE '$search%' OR pr.name LIKE '$search%' OR p.code LIKE '$search%')
            ");
		$row = $query->fetch();
		return $row[0];
	}
}