<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Project;

use App\Models\Project;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class ProjectListScreen extends Screen
{
    /** @var iterable */
    public $query;

    /**     * Fetch data to be displayed on the screen.
     * @return array
     */
    public function query(): iterable
    {
        return [
            'projects' => Project::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }

    /**     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Project';
    }

    /**     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive list of all projects.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.project.index',
        ];
    }

    /**     * The screen's action buttons.
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add Project'))
                ->icon('bs.plus-circle')
                ->href(route('platform.project.create')),
        ];
    }

    /**     * The screen's layout elements.
     * @return Layout[]
     */
    public function layout(): iterable
    {
        return [
            ProjectListLayout::class,
        ];
    }
}