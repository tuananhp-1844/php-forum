<?php
namespace App\Repositories\Contracts;

interface QuestionRepositoryInterface
{
    public function newest();
    public function unResolve();
    public function isPoll();
    public function noAnswer();
}
