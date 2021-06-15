################
Extra components
################

*****
G.729
*****

.. important:: In some countries, you might have to pay royalty fees in order to
   use G.729 codec to their patent holders. We're not legal advisors regarding
   active or withdrawn world patents.

You can use G.729 with IvozProvider, but installation must be done manually.
G.729 codec is optimized for each CPU type and version of asterisk, so each
installation may require a different codec module.

You can download codec from `here <http://asterisk.hosting.lv/>`_ under the
section Asterisk 13.

Once downloaded, move the `.so` file to **/usr/lib/asterisk/modules/** and rename
it to **codec_g729.so**

You can check the codec is valid by restarting asterisk and printing the
available codec translations using:

.. code-block:: console

    systemctl restart asterisk # Restart asterisk
    asterisk -rx 'core show translation' | grep 729

