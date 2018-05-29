<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateHazardlistRequest;
use App\Http\Requests\UpdateHazardlistRequest;
use App\Repositories\HazardlistRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Hazardlist;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HazardlistController extends InfyOmBaseController
{
    /** @var  HazardlistRepository */
    private $hazardlistRepository;

    public function __construct(HazardlistRepository $hazardlistRepo)
    {
        $this->hazardlistRepository = $hazardlistRepo;
    }

    /**
     * Display a listing of the Hazardlist.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->hazardlistRepository->pushCriteria(new RequestCriteria($request));
        $hazardlists = $this->hazardlistRepository->all();
        return view('admin.hazardlists.index')
            ->with('hazardlists', $hazardlists);
    }

    /**
     * Show the form for creating a new Hazardlist.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.hazardlists.create');
    }

    /**
     * Store a newly created Hazardlist in storage.
     *
     * @param CreateHazardlistRequest $request
     *
     * @return Response
     */
    public function store(CreateHazardlistRequest $request)
    {
        $input = $request->all();

        $hazardlist = $this->hazardlistRepository->create($input);

        Flash::success('Hazardlist saved successfully.');

        return redirect(route('admin.hazardlists.index'));
    }

    /**
     * Display the specified Hazardlist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hazardlist = $this->hazardlistRepository->findWithoutFail($id);

        if (empty($hazardlist)) {
            Flash::error('Hazardlist not found');

            return redirect(route('hazardlists.index'));
        }

        return view('admin.hazardlists.show')->with('hazardlist', $hazardlist);
    }

    /**
     * Show the form for editing the specified Hazardlist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hazardlist = $this->hazardlistRepository->findWithoutFail($id);

        if (empty($hazardlist)) {
            Flash::error('Hazardlist not found');

            return redirect(route('hazardlists.index'));
        }

        return view('admin.hazardlists.edit')->with('hazardlist', $hazardlist);
    }

    /**
     * Update the specified Hazardlist in storage.
     *
     * @param  int              $id
     * @param UpdateHazardlistRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHazardlistRequest $request)
    {
        $hazardlist = $this->hazardlistRepository->findWithoutFail($id);

        

        if (empty($hazardlist)) {
            Flash::error('Hazardlist not found');

            return redirect(route('hazardlists.index'));
        }

        $hazardlist = $this->hazardlistRepository->update($request->all(), $id);

        Flash::success('Hazardlist updated successfully.');

        return redirect(route('admin.hazardlists.index'));
    }

    /**
     * Remove the specified Hazardlist from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.hazardlists.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Hazardlist::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.hazardlists.index'))->with('success', Lang::get('message.success.delete'));

       }

}
