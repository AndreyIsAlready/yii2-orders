<?php

namespace order;

class Pagination
{
    /**
     * @param int $page
     * @return array
     */
    public function getCorrectPagination(int $page): array
    {
        if ($page < 6) {
            return [
                'firstPage' => 0,
                'lastPage' => 10,
                'page' => $page
            ];
        }

        if ($page > 994) {
            return [
                'firstPage' => 989,
                'lastPage' => 999,
                'page' => $page
            ];
        }

        return [
            'firstPage' => $page < 6 ? 0 : $page - 5,
            'lastPage' => $page < 6 ? 10 : $page + 5,
            'page' => $page
        ];
    }
}