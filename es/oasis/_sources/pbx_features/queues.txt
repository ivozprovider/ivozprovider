######
Queues
######

Easy queue behaviour was included in IvozProvider in 1.3 version. It is a simple
approach with **the unique goal to provide the capability to handle more calls
than users attending them**.

.. warning:: Queues and callcenter are close terms but different. **IvozProvider
             is not a suitable product for callcenters**, as it does not provide
             advanced features that are crucial to them (reports, RT visualization,
             queue related stat, etc.).

**In distributed installations** using Queues is only compatible with an static
assignment or 'hash based' distribution (see **Distribute method** :ref:`here <Remaining Parameters>`).

.. hint:: Brand operators can choose which Companies have queues (see **Features**
          in :ref:`Brand Configuration` and :ref:`Company Configuration`).

Queue configuration
===================

This are the settings related to a queue:

.. glossary::

  Name
    Use to reference this queue

  Weight
    Priorizes calls to an agent that attends calls in two (or more) calls. The
    higher, the more priorized.

  Strategy
    How will the queue deliver the calls? Calling to all agents, calling to a
    random one?

  Member call seconds
    Defines how long will a call to an agent last.

  Member rest seconds
    Seconds between calls for an agent.

  Announce
    Select a locution and its frequency. Caller waiting in the call will listen
    to this locution.

  Timeout configuration
    Limits the time that a call can wait in a queue and the following behaviour.

  Full Queue configuration
    Limits the amount of people waiting in a call and the behaviour when this limit
    it reached.

Apart from creating a queue, you have to assign users to it. This users will have
a **penalty: a user will not be selected to deliver a call if any user with lower
penalty is available**.


.. hint:: A call can be sent to a queue selecting it in the "Route type" selectors
          available in multiple sections of IvozProvider (extension to queue, DDI
          to queue, etc.)

Queue strategy
==============

The queue strategy **always applies to current penalty members** starting with
the smallest penalty value and only going to the next penalty if all members of
current one are busy or unavailable.

.. glossary::

    Ring all
        The call will make all the members of the current priority during a
        predefined time.

    Least recent
        The call will *jump* from one member to another in a predefined order
        based on the last time the member attended a call. Members whose latest
        call is older will be called first.

    Fewer calls
        The call will *jump* from one member to another in a predefined order
        based on the number of atteded calls. Members that have attedended less
        calls will be called first.

    Random
        The call will *jump* from one member to another in a random order,
        ringing during the configured time.

    Round Robin memory
        The call will *jump* from one member to another in a predefined order
        starting past the last member that attended a call.

    Linear
        The call will *jump* from one member to another in a predefined order
        based on the creation time of the member.
