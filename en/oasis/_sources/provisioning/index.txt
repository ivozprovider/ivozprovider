.. _provisioning:

#####################
Terminal provisioning
#####################

Overview
========

IvozProvider supports provisioning of terminals via HTTP/HTTPS that fulfill the
following requirements:

- Assuming a just unboxed terminal, just plugged and connected to the network:

   - Ask IP address via DHCP.

   - DCHP has enabled the option 66 that points to the platform portal

   - The first requested provisioning file is a static file (different for each 
     model) prefixed with the previous step URL.

   - The served file can redefine the URL for further requests


Any terminal model that can adapt to this provisioning way can be added into
the section **Platform Configuration > Terminal manufacturers**.

.. rubric:: Example Cisco SPA504G

- Cisco SPA504G is turned on and requests an IP address to DHCP

- Receives “http://provision.example.com/provision” as DHCP option 66

- Request HTTP configuration from http://provision.example.com/provision/spa504g.cfg

- All 504G request the same file (spa504.cfg), prefixed with the given URL

- This file only contain basic configuration settings for the model and the URL 
  for the next request (p.e. https://provision.example.com/provision/$MAC.cfg)

- This way, each terminal (MAC should be unique) request a specific file 
  (and different) after the generic one has been served.

- This file will contain the specific configuration for the terminal:

   - User

   - Password

   - SIP Domain


.. note:: IvozProvider provisioning system, right now, only has one goal:
          provide credentials and language settings for the terminals.

Configuration of supported models
=================================

IvozProvider uses a template system that allows global operator (God) to
define new models and configure what files will be served.

The help section of **Terminal manufacturers** has examples for some models
that work (in the moment of writting this) with IvozProvider provisioning system.

.. hint:: These models will be available after the initial installation, but
          you must edit them and load the default configuration before
          you can use the provisioning system (option **Restore default template**).

.. error:: UACs firmware changes may cause that given examples stop working. We
           will try to keep templates updated, but we can't guarantee this point.

Analyzing the suggested templates you can have a basic idea of the flexibility of
the system to configure any existing terminal model in the market and to adapt
them to eventual changes in given examples.

Getting technical
=================

Imagine an environment with this configuration:

- Provisioning URLs:

  - Generic file: http://PROV_IP/provision

  - Specific file: https://PROV_IP:PROV_PORT/provision

- TerminalModels.genericUrlPattern: y000000000044.cfg

Which requested URLs will be valid?

For generic file, just one: http://PROV_IP/provision/y000000000044.cfg

For specific file, requests are right as long as this rules are fulfilled:

- All HTTP requests are wrong.

- HTTPS requests to 443 are wrong (PROV_PORT must be used).

- Subpaths after provisioning URL are ignored, both in request and in
  specificUrlPattern.

- On specific file request, extension must match as long as extension is used
  in specificUrlPattern.

- On specific file request, the filename must match exactly once {mac} is replaced.

- MAC address is case insensitive and can contain colons or not (':').

Let's analyze the examples below to understand this rules better:

.. rubric:: Example 1 - TerminalModels.specificUrlPattern: {mac}.cfg

Working requests:

.. code-block:: console

    https://PROV_IP:PROV_PORT/provision/aabbccddeeff.cfg
    https://PROV_IP:PROV_PORT/provision/aa:bb:cc:dd:ee:ff.cfg
    https://PROV_IP:PROV_PORT/provision/aabbccdd:ee:ff.cfg
    https://PROV_IP:PROV_PORT/provision/aabbccddeeff.cfg
    https://PROV_IP:PROV_PORT/provision/AABBCCDDEEFF.cfg
    https://PROV_IP:PROV_PORT/provision/subpath1/aabbccddeeff.cfg
    https://PROV_IP:PROV_PORT/provision/subpath1/subpath2/aabbccddeeff.cfg

Wrong requests:

.. code-block:: console

    https://PROV_IP:PROV_PORT/provision/aabbccddeeff.boot
    https://PROV_IP:PROV_PORT/provision/subpath1/subpath2/aabbccddeeff.boot

This example is identical to 't23/{mac}.cfg', as subpaths are ignored.

.. rubric:: Example 2 - TerminalModels.specificUrlPattern: {mac}

All previous examples are ok, as extension is ignored if no extension is found
in specificUrlPattern.

This example is identical to 't23/{mac}', as subpaths are ignored.


.. rubric:: Example 3 - TerminalModels.specificUrlPattern: yea-{mac}.cfg

All previous examples are wrong, as no 'yea-' is found ('yea' match is case
sensitive).

Working requests:

.. code-block:: console

    https://PROV_IP:PROV_PORT/provision/subpath1/yea-aabbccdd:ee:ff.cfg

Wrong requests:

.. code-block:: console

    https://PROV_IP:PROV_PORT/provision/subpath1/yea-aabbccdd:ee:ff.boot
    https://PROV_IP:PROV_PORT/provision/subpath1/YEA-aabbccdd:ee:ff.cfg

This example is identical to 't23/yea-{mac}.cfg', as subpaths are ignored.

.. rubric:: Example 4 - TerminalModels.specificUrlPattern: yea-{mac}

As no extension is given:

.. code-block:: console

    https://PROV_IP:PROV_PORT/provision/subpath1/yea-aabbccdd:ee:ff.cfg
    https://PROV_IP:PROV_PORT/provision/subpath1/yea-aabbccdd:ee:ff.boot

Wrong requests:

.. code-block:: console

    https://PROV_IP:PROV_PORT/provision/subpath1/YEA-aabbccdd:ee:ff.cfg

This example is identical to 't23/yea-{mac}', as subpaths are ignored.

