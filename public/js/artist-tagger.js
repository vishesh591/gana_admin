// Artist Tagger Component
const ArtistTagger = {
  init() {
    if (window.artistTaggerInitialized) return;
    window.artistTaggerInitialized = true;
    
    const shell = document.getElementById("artistTagger");
    if (!shell) return;
    
    // Get all required elements
    const elements = {
      input: shell.querySelector(".artist-input"),
      tagsWrap: shell.querySelector(".artist-tags"),
      hiddenWrap: shell.parentElement.querySelector(".artist-hidden-inputs"),
      dropdown: shell.parentElement.querySelector(".artist-suggestions"),
      artistError: document.getElementById("artistError")
    };
    
    // Verify all elements exist
    const missingElements = Object.entries(elements)
      .filter(([key, el]) => !el)
      .map(([key]) => key);
    
    if (missingElements.length > 0) return;
    
    const state = {
      allArtists: [],
      selected: new Map(),
      artistsUrl: shell.dataset.artistsUrl || '/api/artists'
    };
    
    // --- Helpers ---
    const helpers = {
      async fetchArtists() {
        try {
          const response = await fetch(state.artistsUrl);
          
          if (!response.ok) {
            throw new Error(`HTTP ${response.status}`);
          }
          
          const data = await response.json();
          
          if (!data.success || !Array.isArray(data.data)) {
            throw new Error('Invalid API response format');
          }
          
          state.allArtists = data.data.map(artist => ({
            id: String(artist.id),
            name: artist.name,
            label: artist.label_name
          })).filter(a => a.id && a.name);
          
        } catch (error) {
          elements.artistError.textContent = 'Could not load artists. Please try again.';
          elements.artistError.style.display = 'block';
        }
      },
      
      openDropdown(list) {
        elements.dropdown.innerHTML = '';
        
        if (!list.length) {
          elements.dropdown.innerHTML = '<div class="dropdown-item disabled">No matching artists found</div>';
          elements.dropdown.classList.add('show');
          return;
        }
        
        list.forEach(artist => {
          if (state.selected.has(artist.id)) return;
          
          const item = document.createElement('button');
          item.type = 'button';
          item.className = 'dropdown-item artist-suggestion-item';
          item.dataset.id = artist.id;
          item.dataset.name = artist.name;
          item.textContent = artist.label ? `${artist.name} (${artist.label})` : artist.name;
          
          item.addEventListener('click', () => {
            helpers.addArtist(artist);
            helpers.closeDropdown();
          });
          
          elements.dropdown.appendChild(item);
        });
        
        elements.dropdown.classList.add('show');
      },
      
      closeDropdown() {
        elements.dropdown.classList.remove('show');
      },
      
      addArtist(artist) {
        state.selected.set(artist.id, artist);
        helpers.renderTags();
        elements.input.value = '';
        elements.input.focus();
      },
      
      renderTags() {
        elements.tagsWrap.innerHTML = '';
        elements.hiddenWrap.innerHTML = '';
        
        state.selected.forEach(({ id, name }) => {
          // Create visual tag
          const chip = document.createElement('span');
          chip.className = 'artist-chip';
          chip.innerHTML = `${name} <button type="button" class="remove-chip">&times;</button>`;
          
          // Add remove handler
          chip.querySelector('.remove-chip').addEventListener('click', () => {
            state.selected.delete(id);
            helpers.renderTags();
          });
          
          elements.tagsWrap.appendChild(chip);
          
          // Create hidden input
          const hidden = document.createElement('input');
          hidden.type = 'hidden';
          hidden.name = 'artist[]';
          hidden.value = name;  // Store the artist name instead of ID
          elements.hiddenWrap.appendChild(hidden);
        });
      },
      
      filterArtists(query) {
        const term = query.trim().toLowerCase();
        return state.allArtists.filter(artist => 
          artist.name.toLowerCase().includes(term) ||
          (artist.label && artist.label.toLowerCase().includes(term))
        );
      }
    };
    
    // --- Event Handlers ---
    elements.input.addEventListener('input', async function() {
      const query = this.value.trim();
      
      if (state.allArtists.length === 0) {
        await helpers.fetchArtists();
      }
      
      const results = helpers.filterArtists(query);
      helpers.openDropdown(results);
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!shell.contains(e.target) && !elements.dropdown.contains(e.target)) {
        helpers.closeDropdown();
      }
    });
    
    // Initial artists fetch
    helpers.fetchArtists();
  }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  ArtistTagger.init();
});