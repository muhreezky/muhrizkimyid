<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Education;

use Orchid\Screen\Layout;

class EducationListLayout extends Layout
{
    /** @var string */
    public $layout = 'table';

    /**     * Allow or deny access to this layout for the current user.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**     * Build the layout.
     */
    public function build(): iterable
    {
        return [
            EducationListTable::class,
        ];
    }
}